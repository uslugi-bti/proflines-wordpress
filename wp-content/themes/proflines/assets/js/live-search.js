document.addEventListener('DOMContentLoaded', function() {
    const searchForm = document.querySelector('.header-bottom-search__body');
    const searchInput = document.querySelector('.header-bottom-search__body input');
    const tipsList = document.querySelector('.header-bottom-search__tips');
    let searchTimeout;

    if (!searchForm || !searchInput || !tipsList) return;

    function showTips() {
        tipsList.classList.add('open');
    }

    function hideTips() {
        tipsList.classList.remove('open');
        tipsList.innerHTML = '';
    }

    searchInput.addEventListener('input', function(e) {
        clearTimeout(searchTimeout);
        const searchTerm = e.target.value.trim();

        if (searchTerm.length < 2) {
            hideTips();
            return;
        }

        searchTimeout = setTimeout(() => {
            const formData = new FormData();
            formData.append('action', 'ajax_search');
            formData.append('search', searchTerm);

            fetch(search_ajax.url, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.length > 0) {
                    tipsList.innerHTML = data.map(item => 
                        `<li class="header-bottom-search__tip">
                            <a href="${item.url}">${item.highlight}</a>
                        </li>`
                    ).join('');
                    showTips();
                } else {
                    hideTips();
                }
            });
        }, 300);
    });

    searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const searchTerm = searchInput.value.trim();
        
        if (searchTerm.length === 0) return;

        const formData = new FormData();
        formData.append('action', 'ajax_search');
        formData.append('search', searchTerm);

        fetch(search_ajax.url, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                window.location.href = data[0].url;
            }
        });
    });

    document.addEventListener('click', function(e) {
        if (!searchForm.contains(e.target)) {
            hideTips();
        }
    });
});