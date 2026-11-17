<script>
    // Origem: https://stackoverflow.com/questions/5353934/check-if-element-is-visible-on-screen
    function checkVisible(elm) {
        var rect = elm.getBoundingClientRect();
        var viewHeight = Math.max(document.documentElement.clientHeight, window.innerHeight);

        return !(rect.bottom < 0 || rect.top - viewHeight >= 0);
    }

    function loadCard(elm) {
        elm.dataset.loaded = 'true';

        fetch('/product/' + elm.dataset.id, {
            headers: {
                'Content-Type': 'application/json',
            },
        })
        .then(async response => {
            let jsonResponse = await response.json();

            elm.querySelector('.card-image').src = "/imgs/" + jsonResponse.image + ".jpg";
            elm.querySelector('.card-title').textContent = jsonResponse.name;
            elm.querySelector('.card-description').textContent = jsonResponse.description;
            elm.querySelector('.card-price').textContent = 'R$' + jsonResponse.price;
        })
        .catch(error => {
            console.error('Erro:', error);
        });
    }

    function checkCardLoad() {
        document
            .querySelectorAll('.card')
            .forEach(function(item) {
                if (item.dataset.loaded === 'false')
                    if (checkVisible(item))
                        loadCard(item);
            });
    }

    window.onscroll = checkCardLoad;
    window.onload = checkCardLoad;

    document.querySelectorAll('.card-button-edit').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.value;
            const modal = document.getElementById('productModal');
            const contentContainer = document.getElementById('modalContent');

            modal.style.display = 'block';

            fetch('/edit-form/' + productId)
                .then(response => {
                    return response.text(); // Expecting raw HTML text back
                })
                .then(html => {
                    contentContainer.innerHTML = html;
                })
                .catch(error => {
                    contentContainer.innerHTML = '<p style="color:red;">Erro.</p>';
                    console.error('Erro:', error);
                });
        });
    });

    document.querySelectorAll('.card-button-add').forEach(button => {
        button.addEventListener('click', function() {
            const modal = document.getElementById('productModal');
            const contentContainer = document.getElementById('modalContent');

            modal.style.display = 'block';

            fetch('/edit-form')
                .then(response => {
                    return response.text(); // Expecting raw HTML text back
                })
                .then(html => {
                    contentContainer.innerHTML = html;
                })
                .catch(error => {
                    contentContainer.innerHTML = '<p style="color:red;">Erro.</p>';
                    console.error('Erro:', error);
                });
        });
    });

    document.querySelectorAll('.card-button-delete').forEach(button => {
        button.addEventListener('click', function() {
            let productId = this.value;
            let remover = confirm("Deseja remover esse produto?");

            if (remover)
            {
                fetch('/product/' + productId, {
                        method: 'DELETE',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                    })
                    .then(response => {
                        document.querySelector('[data-id="' + productId + '"]').remove();
                        alert('Produto removido!');
                        window.location.reload();
                    })
                    .catch(error => {
                        console.error('Erro:', error);
                    });
            }
        });
    });

    document.querySelectorAll('.card').forEach(button => {
        button.addEventListener('click', function() {
            const productId = this.dataset.id;
            const modal = document.getElementById('productModal');
            const contentContainer = document.getElementById('modalContent');

            modal.style.display = 'block';

            fetch('/product-display/' + productId)
                .then(response => {
                    return response.text(); // Expecting raw HTML text back
                })
                .then(html => {
                    contentContainer.innerHTML = html;
                })
                .catch(error => {
                    contentContainer.innerHTML = '<p style="color:red;">Erro.</p>';
                    console.error('Erro:', error);
                });
        });
    });

    // Close Modal Logic
    document.getElementById('closeModalBtn').addEventListener('click', () => {
        document.getElementById('productModal').style.display = 'none';
    });
</script>