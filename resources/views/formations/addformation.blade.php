@extends('../layout/' . $layout)

@section('subhead')
    <title>Categories - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')






<h1>Creation d'une Formation</h1>
<hr />
<br /><br />
<div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">


            
<form  data-single="true"   autocomplete="off" novalidate method="POST" action="/addformation" enctype="multipart/form-data">
    @csrf
    <div class="position-relative row form-group">
        <label for="nom" class="col-sm-2 col-form-label"
            >Nom de Formation</label
        >
        <div class="col-sm-10">
            <input name="nom" placeholder="nom formation .."  type="text" class="form-control" />
        </div>


    <div class="col-sm-10">
    <div style="background-color:red" >
    @error('nom')
    {{$message}}
    @enderror

    </div>
    </div>


    </div>


    <br>


    <div class="position-relative row form-group">
        <label for="image" class="col-sm-2 col-form-label">Photo</label>
        <div class="col-sm-10">
            <input
                name="image"
                id="exampleFile"
                type="file"
                class="form-control-file"
                accept="image/png, image/gif, image/jpeg"
                
            />
        
        </div>

        <div class="col-sm-10">
    <div style="background-color:red" >    @error('image')
    {{$message}}
    @enderror
    </div>

    </div>
    </div>                     


       

       
    <br>



    <div class="position-relative row form-group">
        <label for="description" class="col-sm-2 col-form-label"
            >Description</label
        >
        <div class="col-sm-10">
            <input
                name="description"
                placeholder="description.."
                type="text"
                class="form-control"
                
            />
        </div>

        <div class="col-sm-10">
    <div style="background-color:red" >    @error('description')
    {{$message}}
    @enderror

    </div>
    </div>

    </div>



    <br>
    <div class="position-relative row form-group">
        <label for="nom_formateur" class="col-sm-2 col-form-label"
            >Nom du formateur</label
        >
        <div class="col-sm-10">
            <input
                name="nom_formateur"
                placeholder="nom.."
                type="text"
                class="form-control"
                
            />
        </div>

        <div class="col-sm-10">
    <div style="background-color:red" >    @error('nom_formateur')
    {{$message}}
    @enderror

    </div>
    </div>

    </div>



    <br>
    
    <div class="position-relative row form-group">
        <label for="mail_formateur" class="col-sm-2 col-form-label"
            >Adresse mail du formateur</label
        >
        <div class="col-sm-10">
            <input
                name="mail_formateur"
                placeholder="adresse mail.."
                type="text"
                class="form-control"
                
            />
        </div>

        <div class="col-sm-10">
    <div style="background-color:red" >    @error('mail_formateur')
    {{$message}}
    @enderror

    </div>
    </div>

    </div>



    <br>
    
  


    
    <div class="position-relative row form-group">
        <label for="formateur_profession" class="col-sm-2 col-form-label"
            >Profession du formateur</label
        >
        <div class="col-sm-10">
            <input
                name="formateur_profession"
                placeholder="profession.."
                type="text"
                class="form-control"
                
            />
        </div>

        <div class="col-sm-10">
    <div style="background-color:red" >    @error('formateur_profession')
    {{$message}}
    @enderror

    </div>
    </div>

    </div>



    <br>




    
    <div class="position-relative row form-group">
        <label for="location_formation" class="col-sm-2 col-form-label"
            >Locale du formation</label
        >
        <div class="col-sm-10">
            <input
                name="location_formation"
                placeholder="local.."
                type="text"
                class="form-control"
                
            />
        </div>

        <div class="col-sm-10">
    <div style="background-color:red" >    @error('location_formation')
    {{$message}}
    @enderror

    </div>
    </div>

    </div>



    <br>



    
    <div class="position-relative row form-group">
        <label for="prix_formation" class="col-sm-2 col-form-label"
            >Prix de formation</label
        >
        <div class="col-sm-10">
            <input
                name="prix_formation"
                placeholder="prix .."
                type="text"
                class="form-control"
                
            />
        </div>

        <div class="col-sm-10">
    <div style="background-color:red" >    @error('prix_formation')
    {{$message}}
    @enderror

    </div>
    </div>

    </div>



    <br>



    
    <div class="position-relative row form-group">
        <label for="duree_formation" class="col-sm-2 col-form-label"
            >Duree du formation</label
        >
        <div class="col-sm-10">
            <input
                name="duree_formation"
                placeholder="date formation.."
                type="text"
                class="form-control"
                
            />
        </div>

        <div class="col-sm-10">
    <div style="background-color:red" >    @error('duree_formation')
    {{$message}}
    @enderror

    </div>
    </div>

    </div>













    <br>
    <div class="position-relative row form-check p-0">
        <div class="col-sm-10 offset-sm-2">
            <button class="btn btn-primary">Soumettre</button>
        </div>
    </div>
    
</form>
</div>
    </div>  </div>
    
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
    