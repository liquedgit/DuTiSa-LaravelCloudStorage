const CHECK_INTERVAL = 1000;
const DEFAULT_TIMEOUT = 60000;
let PREV_TIMER = Date.now();

window.addEventListener('click', () => {
    PREV_TIMER = Date.now();
})
window.addEventListener('keydown', () => {
    PREV_TIMER = Date.now();
})

setInterval(function(){
    let currTime = Date.now();

    if(currTime - PREV_TIMER >= DEFAULT_TIMEOUT) {
        let url = `${window.location["origin"]}/logout`;
        window.location.href = url;
        clearInterval(this);
    }
}, CHECK_INTERVAL)
