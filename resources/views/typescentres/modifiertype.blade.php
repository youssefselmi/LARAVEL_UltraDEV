@extends('../layout/' . $layout)

@section('subhead')
    <title>Categories - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')









<h1>Modifier le type</h1>
<hr />
<br /><br />

<div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">

<form
    autocomplete="off"
    class="needs-validation"
    novalidate
    method="POST"
    action="/typecentre/{{ $typecentre->id }}"
    enctype="multipart/form-data"
    onsubmit="return checkDate()"
>
    @csrf @method('PUT')
    <div class="position-relative row form-group">
        <label for="nom" class="col-sm-2 col-form-label"
            >Type de centre</label
        >
        <div class="col-sm-10">
            <input
                value="{{$typecentre->type}}"
                name="type"
                placeholder="e.g Tomorrowland"
                type="text"
                class="form-control"
                required
            />
            <div class="invalid-feedback">Veuillez entrer un valid nom</div>
        </div>
    </div>
 

  






  

    
 
 
    <div class="position-relative row form-check p-0">
        <div class="col-sm-10 offset-sm-2">
            <button class="btn btn-primary">Soumettre</button>
        </div>
    </div>
</form>

</div></div></div>

<button type="button" class="open-modal" data-toggle="modal" data-target="#exampleModal" style="width : 0; height : 0; opacity : 0">
</button>

<script>
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
</script>

<script>
    document.querySelector("a#create").classList.add("mm-active");
    
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
