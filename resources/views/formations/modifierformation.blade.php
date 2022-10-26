@extends('../layout/' . $layout)

@section('subhead')
    <title>Categories - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')









<h1>Modification d'un formation</h1>
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
    action="/formation/{{ $formation->id }}"
    enctype="multipart/form-data"
    onsubmit="return checkDate()"
>
    @csrf @method('PUT')
    <div class="position-relative row form-group">
        <label for="nom" class="col-sm-2 col-form-label"
            >Nom de Formation</label
        >
        <div class="col-sm-10">
            <input
                value="{{$formation->nom}}"
                name="nom"
                placeholder="e.g Tomorrowland"
                type="text"
                class="form-control"
                required
            />
        </div>
    </div>
    <div class="position-relative row form-group">
        <label for="image" class="col-sm-2 col-form-label">Image</label>
        <div class="col-sm-10">
            <input
                name="image"
                id="exampleFile"
                type="file"
                class="form-control-file"
                accept="image/png, image/gif, image/jpeg"
            />
            <small class="form-text text-muted"
                >Choisissez des photos avec des bonnes qualités</small
            >
        </div>
    </div>





    


    
    <div class="position-relative row form-group">
    <label for="nom_session" class="col-sm-2 col-form-label">session</label>
    <div class="col-sm-10">
    <select class="form-control"name="nom_session">
            @foreach ($les as $key => $value)
            <option value="{{$value->id}}">
                {{ $value->nom_session }}
            </option>
            @endforeach
        </select>
</div>
</div>




















    <div class="position-relative row form-group">
        <label for="description" class="col-sm-2 col-form-label"
            >Description</label
        >
        <div class="col-sm-10">
            <input
                value="{{$formation->description}}"
                name="description"
                placeholder="e.g Tomorrowland"
                type="text"
                class="form-control"
                required
            />
            <div class="invalid-feedback">Veuillez entrer la description</div>
        </div>
    </div>
    <div class="position-relative row form-group">
        <label for="mail_formateur" class="col-sm-2 col-form-label"
            >Mail du formateur</label
        >
        <div class="col-sm-10">
            <input
                value="{{$formation->mail_formateur}}"
                name="mail_formateur"
                placeholder="e.g Tomorrowland"
                type="text"
                class="form-control"
                required
            />
            <div class="invalid-feedback">Veuillez entrer le mail du formateur</div>
        </div>
    </div>
    <div class="position-relative row form-group">
        <label for="nom_formateur" class="col-sm-2 col-form-label"
            >Nom du formateur</label
        >
        <div class="col-sm-10">
            <input
                value="{{$formation->nom_formateur}}"
                name="nom_formateur"
                placeholder="e.g Tomorrowland"
                type="text"
                class="form-control"
                required
            />
            <div class="invalid-feedback">Veuillez entrer le nom du formateur</div>
        </div>
    </div>
    <div class="position-relative row form-group">
        <label for="formateur_profession" class="col-sm-2 col-form-label"
            >Profession du formateur</label
        >
        <div class="col-sm-10">
            <input
                value="{{$formation->formateur_profession}}"
                name="formateur_profession"
                placeholder="e.g Tomorrowland"
                type="text"
                class="form-control"
                required
            />
            <div class="invalid-feedback">Veuillez entrer la profession du formateur</div>
        </div>
    </div>
    <div class="position-relative row form-group">
        <label for="mail_formateur" class="col-sm-2 col-form-label"
            >Mail du formateur</label
        >
        <div class="col-sm-10">
            <input
                value="{{$formation->mail_formateur}}"
                name="mail_formateur"
                placeholder="e.g Tomorrowland"
                type="text"
                class="form-control"
                required
            />
            <div class="invalid-feedback">Veuillez entrer le mail du formateur</div>
        </div>
    </div>
    <div class="position-relative row form-group">
        <label for="location_formation" class="col-sm-2 col-form-label"
            >Local du formateur</label
        >
        <div class="col-sm-10">
            <input
                value="{{$formation->location_formation}}"
                name="location_formation"
                placeholder="e.g Tomorrowland"
                type="text"
                class="form-control"
                required
            />
            <div class="invalid-feedback">Veuillez entrer la location du formation</div>
        </div>
    </div>
    <div class="position-relative row form-group">
        <label for="prix_formation" class="col-sm-2 col-form-label"
            >Prix de formation</label
        >
        <div class="col-sm-10">
            <input
                value="{{$formation->prix_formation}}"
                name="prix_formation"
                placeholder="e.g Tomorrowland"
                type="text"
                class="form-control"
                required
            />
            <div class="invalid-feedback">Veuillez le prix de formation</div>
        </div>
    </div>
    <div class="position-relative row form-group">
        <label for="duree_formation" class="col-sm-2 col-form-label"
            >Duree du formation</label
        >
        <div class="col-sm-10">
            <input
                value="{{$formation->duree_formation}}"
                name="duree_formation"
                placeholder="e.g Tomorrowland"
                type="text"
                class="form-control"
                required
            />
            <div class="invalid-feedback">Veuillez entrer la Duree du formation</div>
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
