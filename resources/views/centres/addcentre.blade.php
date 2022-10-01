@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
<h4 class="fw-bold py-3 mb-4">
  <span class="text-muted fw-light">Tables /</span> Basic Tables
</h4>









<h1>Creation d'un Centre</h1>
<hr />
<br /><br />

<form
    autocomplete="off"
    class="needs-validation"
    novalidate
    method="POST"
    action="/addcentre"
    enctype="multipart/form-data"
    onsubmit="return checkDate()"
>
    @csrf
    <div class="position-relative row form-group">
        <label for="nom" class="col-sm-2 col-form-label"
            >Nom de centre</label
        >
        <div class="col-sm-10">
            <input
                name="nom"
                placeholder="e.g A.L.A cancert"
                type="text"
                class="form-control"
                required
            />
            <div class="invalid-feedback">Veuillez entrer un valid nom</div>
        </div>
    </div>


    <div class="position-relative row form-group">
        <label for="image" class="col-sm-2 col-form-label">Photo</label>
        <div class="col-sm-10">
            <input
                name="image"
                id="exampleFile"
                type="file"
                class="form-control-file"
                accept="image/png, image/gif, image/jpeg"
                required
            />
            <div class="invalid-feedback">Veuillez entrer une photo valide</div>
            <small class="form-text text-muted"
                >Choisissez des photos avec des bonnes qualités</small
            >
        </div>
    </div>

   



    <div class="position-relative row form-group">
        <label for="locale" class="col-sm-2 col-form-label"
            >Locale</label
        >
        <div class="col-sm-10">
            <input
                name="locale"
                placeholder="e.g A.L.A cancert"
                type="text"
                class="form-control"
                required
            />
            <div class="invalid-feedback">Veuillez entrer un valid locale</div>
        </div>
    </div>








    <div class="position-relative row form-group">
        <label for="type" class="col-sm-2 col-form-label"
            >Nom de type</label
        >
        <div class="col-sm-10">
            <input
                name="type"
                placeholder="e.g A.L.A cancert"
                type="text"
                class="form-control"
                required
            />
            <div class="invalid-feedback">Veuillez entrer un valid type</div>
        </div>
    </div>











    <div class="position-relative row form-check p-0">
        <div class="col-sm-10 offset-sm-2">
            <button class="btn btn-primary">Soumettre</button>
        </div>
    </div>
    
</form>

<button type="button" class="open-modal" data-toggle="modal" data-target="#exampleModal" style="width : 0; height : 0; opacity : 0">
</button>



<script>
    document.querySelector("a#evenement-create").classList.add("mm-active");
    checkDate = () => {
        const dateValue = document.querySelector('#event-date').value 
        console.log(dateValue && new Date(dateValue).getTime() >= new Date().getTime())
        if (!dateValue)
            return false
        if(new Date(dateValue).getTime() >= new Date().getTime())
            return true
        else{
            document.querySelector(".open-modal")?.click();
            return false
        }

    }
    // console.log(document.querySelector('#event-date').mi)
    // document.querySelector('input[type="date"]').min = "2021-11-1"
    // document.querySelector('input[type="date"]').max = "2023-11-1"
</script>
<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function () {
        "use strict";
        window.addEventListener(
            "load",
            function () {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName("needs-validation");
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(
                    forms,
                    function (form) {
                        form.addEventListener(
                            "submit",
                            function (event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add("was-validated");
                            },
                            false
                        );
                    }
                );
            },
            false
        );
    })();

</script>













@endsection
