

class GsapControls {
    constructor() {}

    commonHeroAnimation() {
        gsap.set('.text-element-container', { opacity: 0, x: -100 });
        gsap.set('.image-element-container', { opacity: 0, x: 100 });

        // Animate the text first (left to right)
        gsap.to('.text-element-container', {
            duration: 1.5,
            x: 0,
            opacity: 1,
            ease: "power2.out",
        });

        // Animate the image second (right to left) with a delay
        gsap.to('.image-element-container', {
            duration: 1.5,
            x: 0,
            opacity: 1,
            ease: "power2.out",
            delay: 0.5 // Waits for text animation to start first
        });
    }

    commonTwoColumn() {
        const sections = document.querySelectorAll("[class^='common-two-column-']");
        
        // Check how many sections are visible upon load
        let visibleSections = [];
        sections.forEach(section => {
            const rect = section.getBoundingClientRect();
            if (rect.top < window.innerHeight && rect.bottom > 0) {
                visibleSections.push(section);
            }
        });
    
        sections.forEach((section, index) => {
            const leftElement = section.querySelector('.gsap-element-left');
            const rightElement = section.querySelector('.gsap-element-right');
    
            // If multiple sections are visible, stagger their delays
            const applyDelay = visibleSections.length > 1;
            const staggerDelay = applyDelay ? index * 0.5 : 0; 
    
            if (leftElement) {
                gsap.set(leftElement, { opacity: 0, x: 100 });
                gsap.to(leftElement, {
                    duration: 1.5,
                    x: 0,
                    opacity: 1,
                    ease: "power2.out",
                    delay: staggerDelay,
                    scrollTrigger: {
                        trigger: section,
                        start: "top 75%",
                        toggleActions: "play none none none"
                    }
                });
            }
    
            if (rightElement) {
                gsap.set(rightElement, { opacity: 0, x: -100 });
                gsap.to(rightElement, {
                    duration: 1.5,
                    x: 0,
                    opacity: 1,
                    ease: "power2.out",
                    delay: staggerDelay + (applyDelay ? 0.3 : 0), // Slight delay if stagger applies
                    scrollTrigger: {
                        trigger: section,
                        start: "top 75%",
                        toggleActions: "play none none none"
                    }
                });
            }
        });
    }

    boxedThreeColumn() {
        gsap.set(".boxed-item", { opacity: 0, y: 100 });

        gsap.to(".boxed-item", {
            duration: 1.5,
            y: 0,
            opacity: 1,
            ease: "power2.out",
            stagger: 0.2, // Delays each item for a natural staggered effect
            scrollTrigger: {
                trigger: ".boxed-three-column",
                start: "top 75%",
                toggleActions: "play none none none"
            }
        });        
    }
    
    heroSlider() {
        gsap.set('.hero-text-element', { opacity: 0, x: -100 });

        gsap.to('.hero-text-element', {
            duration: 1.5,
            x: 0,
            opacity: 1,
            ease: "power2.out",
        });
    }

    heroSection() {
        gsap.set('.simple-header', { opacity: 0, y: 100 });
        gsap.set('.component-item-element', { opacity: 0, y: 100 });
        gsap.set('.ag-element-right', { opacity: 0, x: 100 });
        gsap.set('.ag-element-left', { opacity: 0, x: -100 });
        gsap.set('.comm-of-practice', { opacity: 0 });
        gsap.set('.knowledge-resources', { opacity: 0 });

        gsap.to('.simple-header', {
            duration: 1.5,
            y: 0,
            opacity: 1,
            ease: "power2.out",
        });

        gsap.to(".component-item-element", {
            duration: 1.5,
            y: 0,
            opacity: 1,
            ease: "power2.out",
            stagger: 0.2, // Delays each item for a natural staggered effect
            scrollTrigger: {
                trigger: ".component-item-element",
                start: "top 75%",
                toggleActions: "play none none none"
            }
        });    

        gsap.to('.ag-element-left', {
            duration: 1.5,
            x: 0,
            opacity: 1,
            ease: "power2.out",
            scrollTrigger: {
                trigger: ".ag-elements",
                start: "top 75%",
                toggleActions: "play none none none"
            }
        });

        gsap.to('.ag-element-right', {
            duration: 1.5,
            x: 0,
            opacity: 1,
            ease: "power2.out",
            delay: 0.5, // Adds a 0.5s delay before starting the animation
            scrollTrigger: {
                trigger: ".ag-elements",
                start: "top 75%",
                toggleActions: "play none none none"
            }
        });

        gsap.to('.comm-of-practice', {
            duration: 1.5, // Instantly applies the effect
            opacity: 1,
            delay: 0.1, // Waits 0.5s before making the element visible
            scrollTrigger: {
                trigger: ".comm-of-practice",
                start: "top 75%",
                toggleActions: "play none none none"
            }
        });

        gsap.to('.knowledge-resources', {
            duration: 1.5, // Instantly applies the effect
            opacity: 1,
            delay: 0.1, // Waits 0.5s before making the element visible
            scrollTrigger: {
                trigger: ".knowledge-resources",
                start: "top 75%",
                toggleActions: "play none none none"
            }
        });
    }
}

export default GsapControls;
