@extends('../layout/' . $layout)

@section('subhead')
    <title>Categories - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')






<h1>Creation d'un Centre</h1>
<hr />
<br /><br />
<div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">


        




<form  data-single="true"   autocomplete="off" novalidate method="POST" action="/addappointment" enctype="multipart/form-data">
    @csrf
    <div class="position-relative row form-group">
        <label for="with" class="col-sm-2 col-form-label"
            >Avec</label
        >
        <div class="col-sm-10">
            <input name="with" placeholder="Avec.."  type="text" class="form-control" />
        </div>


        <div class="alert alert-warning alert-dismissible fade show" role="alert">
    @error('with')
    <strong>Erreur</strong>
    {{$message}}
    @enderror
    </div>


    </div>
    <br>



    <div class="position-relative row form-group">
        <label for="date" class="col-sm-2 col-form-label"
            >Date de rendez vous</label
        >
        <div class="col-sm-10">
            <input name="date"   type="date" class="form-control" />
        </div>


        <div class="alert alert-warning alert-dismissible fade show" role="alert">
    @error('date')
    <strong>Erreur</strong>
    {{$message}}
    @enderror
    </div>


    </div>
    <br>



    <div class="position-relative row form-group">
        <label for="reason" class="col-sm-2 col-form-label"
            >Raison de rendez-Vous</label
        >
        <div class="col-sm-10">
            <input name="reason" placeholder="Raison.."  type="text" class="form-control" />
        </div>


        <div class="alert alert-warning alert-dismissible fade show" role="alert">
    @error('reason')
    <strong>Erreur</strong>
    {{$message}}
    @enderror
    </div>


    </div>
    <br>



    
                            





    </div>                     


       

       
    <br>





    <div class="position-relative row form-group">
        <label for="for" class="col-sm-2 col-form-label"
            >Pour</label
        >
        <div class="col-sm-10">
            <input
                name="for"
                placeholder="Pour Mr/mdme.."
                type="text"
                class="form-control"
                
            />
        </div>

           <div class="alert alert-warning alert-dismissible fade show" role="alert">
    @error('for')
    <strong>Erreur</strong>
    {{$message}}
    @enderror
    </div>

    </div>



    <br>


   


    <div class="position-relative row form-group">
    <label for="for" class="col-sm-2 col-form-label">Type de appointment</label>
    <div class="col-sm-10">
    <select class="form-control"name="type_id">
            @foreach ($donnes as $key => $value)
            <option value="{{$value->id}}">
                {{ $value->type }}
            </option>
            @endforeach
        </select>
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
