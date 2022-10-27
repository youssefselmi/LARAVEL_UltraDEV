@extends('../layout/' . $layout)

@section('subhead')
    <title>Categories - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')

    <h1>Creation d'un Service</h1>
    <hr/>
    <br/><br/>
    <div class="grid grid-cols-12 gap-6 mt-5">
        <div class="intro-y col-span-12 lg:col-span-6">
            <!-- BEGIN: Form Layout -->
            <div class="intro-y box p-5">
                <form data-single="true" autocomplete="off" novalidate method="POST" action="/addservice"
                      enctype="multipart/form-data">
                    @csrf
                    <div class="position-relative row form-group">
                        <label for="nom" class="col-sm-2 col-form-label">Nom du service</label>
                        <div class="input-group">
                            <input id="crud-form-3" name="nom" type="text" class="form-control"
                                   placeholder="Nom du Service .." aria-describedby="input-group-1">
                            <div id="input-group-1" class="input-group-text">Nom</div>
                        </div>
                        <div class="alert alert-danger alert-dismissible fade show">
                            @error('nom')
                            <strong>Erreur</strong>
                            {{$message}}
                            @enderror
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
                        <div class="alert alert-danger alert-dismissible fade show">
                            @error('image')
                            <strong>Erreur</strong>
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="position-relative row form-group">
                        <label for="locale" class="col-sm-2 col-form-label"
                        >Locale</label
                        >
                        <div class="input-group">
                            <input id="crud-form-3" name="locale" type="text" class="form-control"
                                   placeholder="Locale .." aria-describedby="input-group-1">
                            <div id="input-group-1" class="input-group-text">Locale</div>
                        </div>
                        <div class="alert alert-danger alert-dismissible fade show">
                            @error('locale')
                            <strong>Erreur</strong>
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="position-relative row form-group">
                        <label for="locale" class="col-sm-2 col-form-label">Type du Service</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="promo_id">
                                @foreach ($donnes as $key => $value)
                                    <option value="{{$value->id}}">
                                        {{ $value->promo }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="position-relative row form-group">
                        <label for="desc" class="col-sm-2 col-form-label">Description</label>
                        <div class="input-group">
                            <input id="crud-form-3" name="desc" type="text" class="form-control"
                                   placeholder="Desc Service .." aria-describedby="input-group-1">
                            <div id="input-group-1" class="input-group-text">Nom</div>
                        </div>
                        <div class="alert alert-danger alert-dismissible fade show">
                            @error('desc')
                            <strong>Erreur</strong>
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="position-relative row form-group">
                        <label for="tel" class="col-sm-2 col-form-label">Description</label>
                        <div class="input-group">
                            <input id="crud-form-3" name="tel" type="text" class="form-control"
                                   placeholder="TELPHONE .." aria-describedby="input-group-1">
                            <div id="input-group-1" class="input-group-text">Nom</div>
                        </div>
                        <div class="alert alert-danger alert-dismissible fade show">
                            @error('tel')
                            <strong>Erreur</strong>
                            {{$message}}
                            @enderror
                        </div>
                    </div>
                    <br>
                    <div class="position-relative row form-group">
                        <label for="price" class="col-sm-2 col-form-label">Prix</label>
                        <div class="input-group">
                            <input id="crud-form-3" name="price" type="text" class="form-control"
                                   placeholder="Price .." aria-describedby="input-group-1">
                            <div id="input-group-1" class="input-group-text">Nom</div>
                        </div>
                        <div class="alert alert-danger alert-dismissible fade show">
                            @error('price')
                            <strong>Erreur</strong>
                            {{$message}}
                            @enderror
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
        </div>
    </div>

    <button type="button" class="open-modal" data-toggle="modal" data-target="#exampleModal"
            style="width : 0; height : 0; opacity : 0">
    </button>
















    <script>
        document.querySelector("a#evenement-create").classList.add("mm-active");
        checkDate = () => {
            const dateValue = document.querySelector('#event-date').value
            console.log(dateValue && new Date(dateValue).getTime() >= new Date().getTime())
            if (!dateValue)
                return false
            if (new Date(dateValue).getTime() >= new Date().getTime())
                return true
            else {
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
