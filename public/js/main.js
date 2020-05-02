$(function() {
    $("#pizzas").tablesorter({
        theme : "bootstrap",

        widthFixed: true,
    
        widgets : [ "filter", "columns", "zebra" ],

        widgetOptions : {
            // using the default zebra striping class name, so it actually isn't included in the theme variable above
            // this is ONLY needed for bootstrap theming if you are using the filter widget, because rows are hidden
            zebra : ["even", "odd"],
      
            // class names added to columns when sorted
            columns: [ "primary", "secondary", "tertiary" ],
      
            // extra css class name (string or array) added to the filter element (input or select)
            filter_cssFilter: [
              'form-control',
              'form-control',
              'form-control', // select needs custom class names :(
              'form-control',
              'form-control',
              'form-control',
              'form-control',
              'form-control'
            ]
      
          }
    });
});

document.addEventListener('DOMContentLoaded', (event) => {
    var pepper = document.getElementsByClassName("pepper");

    if (pepper) {
        for (var i = 0; i < pepper.length; i++) {
            var amount = pepper[i].innerHTML;
            pepper[i].innerHTML = "";
            for (var j = 0; j < amount; j++)
                pepper[i].innerHTML += "<i class=\"fas fa-pepper-hot text-danger\"></i>";
                pepper[i].innerHTML += "<div style=\"display: none;\">"+j+"</div>";
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
