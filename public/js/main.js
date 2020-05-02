document.addEventListener('DOMContentLoaded', (event) => {
    var pepper = document.getElementsByClassName("pepper");

    if (pepper) {
        for (var i = 0; i < pepper.length; i++) {
            var amount = pepper[i].innerHTML;
            pepper[i].innerHTML = "";
            for (var j = 0; j < amount; j++)
                pepper[i].innerHTML += "<i class=\"fas fa-pepper-hot text-danger\"></i>";
        }
    }

});

const pizzas = document.getElementById('pizzas');

if (pizzas) {
    pizzas.addEventListener('click', e => {
        if (e.target.className === 'btn btn-danger delete-pizza') {
            if (confirm('Na pewno chcesz usunąć wpis?')) {
                const id = e.target.getAttribute('data-id');

                fetch(`/pizza/delete/${id}`, {
                    method: 'DELETE'
                }).then(res => window.location.reload());
            }
        }
    })
}