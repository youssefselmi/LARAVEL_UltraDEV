@extends('../layout/' . $layout)

@section('subhead')
    <title>Categories - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')






<h1>Creation d'un Type</h1>
<hr />
<br /><br />



<div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">





<form  data-single="true"  
    autocomplete="off"
    class="needs-validation"
    novalidate
    method="POST"
    action="/addtype"
    enctype="multipart/form-data"
>
    @csrf
    <div class="position-relative row form-group">
        <label for="type" class="col-sm-2 col-form-label"
            >Type </label
        >
        <div class="col-sm-10">
            <input
                name="type"
                placeholder="type.."
                type="text"
                class="form-control"
                
                
            />
        </div>

        
    <div class="col-sm-10">
    <div style="background-color:red" >
    @error('type')
    {{$message}}
    @enderror
    </div>
    </div>


    </div>




    <br />


    <div class="position-relative row form-check p-0">
        <div class="col-sm-10 offset-sm-2">
            <button class="btn btn-primary">Soumettre</button>
        </div>
    </div>
    
</form>


</div>
</div>
</div>

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
