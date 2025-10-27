<div>
   <h2 class="text-2xl font-semibold mb-4">CO₂ Emissions per Capita — Southeast Asia (Latest Available)</h2>
  <canvas id="climateChart" width="600" height="400"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const countries = ["PHL", "IDN", "VNM", "THA", "MYS"];
    const countryNames = {
        "PHL": "Philippines",
        "IDN": "Indonesia",
        "VNM": "Vietnam",
        "THA": "Thailand",
        "MYS": "Malaysia"
    };

    const indicator = "EG.FEC.RNEW.ZS";
    const url = `https://api.worldbank.org/v2/country/${countries.join(';')}/indicator/${indicator}?format=json&date=2000:2022&per_page=2000`;

    fetch(url)
        .then(res => res.json())
        .then(data => {
            const rows = data[1];
            if (!rows) {
                console.error("No data returned from API.");
                return;
            }

            // Unique years sorted ASC (e.g. 2000 → 2022)
            const years = [...new Set(rows.map(item => item.date))].sort();

            // Build datasets for each country
            const datasets = countries.map(code => {
                const values = years.map(year => {
                    const record = rows.find(item =>
                        item.countryiso3code === code && item.date === year
                    );
                    return record ? record.value : null;
                });

                return {
                    label: countryNames[code],
                    data: values,
                    borderWidth: 2,
                    spanGaps: true,   // allow lines even if there's a missing value
                    tension: 0.3
                };
            });

            const ctx = document.getElementById("climateChart").getContext("2d");
            new Chart(ctx, {
                type: "line",
                data: {
                    labels: years,
                    datasets: datasets
                },
                options: {
                    responsive: true,
                    plugins: {
                        title: {
                            display: true,
                            text: "Renewable Energy Consumption (% of Total) – Southeast Asia (2000–2022)"
                        },
                        legend: {
                            position: "bottom"
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: "Year"
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: "% of Renewable Energy"
                            }
                        }
                    }
                }
            });
        })
        .catch(err => console.error("API Fetch Error:", err));
});
</script>