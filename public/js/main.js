$(document).ready(function () {
    $("#pizzas").tablesorter({
        theme: "bootstrap",

        widthFixed: true,

        widgets: ["filter", "columns", "zebra"],

        widgetOptions: {
            zebra: ["even", "odd"],

            columns: ["primary", "secondary", "tertiary"],    
                 
            filter_cssFilter: [
                'form-control',
                'form-control',
                'form-control',
                'form-control',
                'form-control',
                'form-control',
                'form-control',
                'form-control'
            ]

        }
    });
});

$(document).ready(function () {
    var pepper = document.getElementsByClassName("pepper");

    if (pepper) {
        for (var i = 0; i < pepper.length; i++) {
            var amount = pepper[i].innerHTML;
            pepper[i].innerHTML = "";
            for (var j = 0; j < amount; j++)
                pepper[i].innerHTML += "<i class=\"fas fa-pepper-hot text-danger\"></i>";
            pepper[i].innerHTML += "<div style=\"display: none;\">" + j + "</div>";
        }
    }

});

$(document).ready(function () {
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
});