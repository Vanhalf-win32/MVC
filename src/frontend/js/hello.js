//DOM - DOcument object model


window.addEventListener('load', () => {
    const helloButton = document.getElementsByClassName('js-say-hello')[0];
    helloButton.addEventListener(
        'click', 
        () => window.alert('Fuck Off')
        )
})