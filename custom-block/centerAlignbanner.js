wp.blocks.registerBlockType("centerAlignBlockTheme/banner", {
    title: "Banner",
    icon: 'megaphone',
    edit: EditComponent,
    save: SaveComponent
})

function EditComponent() {
    return <div>Block theme</div>
}

function SaveComponent() {
    return(
        <p>saved</p>
    )
}