const $readmore = document.getElementById('readmore');
if($readmore instanceof HTMLElement) {
    let page = 0;
    $readmore.addEventListener('click', () => fetch('/?page=' + ++page, {method: 'get'}).then(async response => {
        const parser = new DOMParser();
        const doc = parser.parseFromString(await response.text(), 'text/html');
        const list = doc.querySelectorAll('.uk-container > .uk-list > li');
        if(list.length >0) {
            Array.from(list).forEach(item => {
                document.querySelector('.uk-container > .uk-list').appendChild(item);
            })
        }
    }))
}