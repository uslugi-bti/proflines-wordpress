document.addEventListener('DOMContentLoaded', () => {

    const searchBlock = document.querySelector('.header-bottom__search');
    const input = searchBlock.querySelector('input[name="s"]');
    const tips = searchBlock.querySelector('.header-bottom-search__tips');

    let timer = null;

    function highlight(text, query) {
        const regex = new RegExp(`(${query})`, 'gi');
        return text.replace(regex, '<strong>$1</strong>');
    }

    input.addEventListener('input', () => {

        clearTimeout(timer);

        const query = input.value.trim();

        if (query.length < 2) {
            tips.innerHTML = '';
            tips.style.display = 'none';
            return;
        }

        timer = setTimeout(() => {

            fetch(`${liveSearchData.ajax_url}?action=live_search&s=${encodeURIComponent(query)}`)
                .then(response => response.json())
                .then(data => {

                    if (!data.length) {
                        tips.innerHTML = `
                            <li class="header-bottom-search__tip no-results">
                                Nič sa nenašlo
                            </li>
                        `;
                        tips.style.display = 'block';
                        return;
                    }

                    tips.innerHTML = data.map(item => `
                        <li class="header-bottom-search__tip">
                            <a href="${item.link}">
                                ${highlight(item.title, query)}
                            </a>
                        </li>
                    `).join('');

                    tips.style.display = 'block';
                });

        }, 300);
    });


    document.addEventListener('click', (e) => {
        if (!e.target.closest('.header-bottom__search')) {
            tips.innerHTML = '';
            tips.style.display = 'none';
        }
    });

});