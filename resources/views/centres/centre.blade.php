@extends('../layout/' . $layout)

@section('subhead')
    <title>Categories - Midone - Tailwind HTML Admin Template</title>
@endsection

@section('subcontent')



@include('toastr')

<h2 class="intro-y text-lg font-medium mt-10">Centres</h2>

<div class="intro-y col-span-12 flex flex-wrap sm:flex-nowrap items-center mt-2">
<form class="edit-form" action="/addcentre" method="GET" >

<button class="btn btn-primary shadow-md mr-2">Ajouter un centre</button>
</form>

<div class="dropdown">
                <button class="dropdown-toggle btn px-2 box" aria-expanded="false" data-tw-toggle="dropdown">
                    <span class="w-5 h-5 flex items-center justify-center">
                        <i class="w-4 h-4" data-lucide="plus"></i>
                    </span>
                </button>
                <div class="dropdown-menu w-40">
                    <ul class="dropdown-content">
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="printer" class="w-4 h-4 mr-2"></i> Print
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to Excel
                            </a>
                        </li>
                        <li>
                            <a href="" class="dropdown-item">
                                <i data-lucide="file-text" class="w-4 h-4 mr-2"></i> Export to PDF
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="hidden md:block mx-auto text-slate-500">Showing 1 to 10 of 150 entries</div>
            <div class="w-full sm:w-auto mt-3 sm:mt-0 sm:ml-auto md:ml-0">
                <div class="w-56 relative text-slate-500">
                    <input type="text" class="form-control w-56 box pr-10" placeholder="Search...">
                    <i class="w-4 h-4 absolute my-auto inset-y-0 mr-3 right-0" data-lucide="search"></i>
                </div>
            </div>
        </div>


















<div class="head" style="display: block-flex; align-items: center">
    <hr />
    <br />
    <div class="text-right">
        <div
            role="group"
            class="btn-group-sm btn-group btn-group-toggle"
            data-toggle="buttons"
        >

        <form class="edit-form" action="/centregrid" method="GET" >

            <button
                onclick="toGrid()"
                class="btn btn-outline-primary p-2 btn-transition"
            >
                <input
                    type="radio"
                    name="options"
                    id="option1"
                    autocomplete="off"
                />
                Grid
            </button>
</form>




           <button> <label onclick="toList()"
                class="btn btn-outline-primary p-2 btn-transition focus active" > 

                <input
                    type="radio"
                    name="options"
                    id="option2"
                    autocomplete="off"
                />
                List
            </label>
            </button>


            
        </div>
    </div>
</div>

<br />
<div
    class="evenements-grid-container flex-wrap"
    style="gap: 1.5rem; display: none"
>
@foreach ($centres as $centre)

<div
        class="card mt-2"
        style="width: 20rem; transition: opacity 0.5s"
        id="{{ $centre->id }}"
    >
        <img
            class="card-img-top"
            src="{{ 'storage/imgs/'.$centre['image'] }}"
            alt="evenement photo"
            style="max-height: 15rem; object-fit: cover"
        />
        <div class="card-body">
            <h5 class="card-title mb-2 font-weight-bold">
                {{ $centre["nom"] }}
            </h5>
            <p class="card-text text-muted text-truncate">
                {{ $centre["type_id"] }}
            </p>
            <div
                class="actions"
                style="
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                "
            >
                <a href="/centre" style="opacity : 0; width : 0; height : 0" disabled>Explorer plus</a>
                <div
                    class="action-icon-buttons"
                    style="display: flex; gap: 1rem"
                >
                    <form
                        class="edit-form"
                        action="/centre/{{ $centre['id'] }}/modifier"
                        method="GET"
                    >
                        <button
                            type="submit"
                            class="modifier"
                            style="
                                outline: none;
                                border: none;
                                background-color: white;
                                width: 1.2rem;
                                aspect-ratio: 1/1;
                                background-image: url('../storage/assets/svgs/edit.svg');
                                background-size: contain;
                                background-repeat: no-repeat;
                                background-position: center;
                                color: red;
                                cursor: pointer;
                                padding-right: 0.8rem;
                            "
                            data-toggle="tooltip"
                            data-placement="left"
                            title="modifier"
                        ></button>
                    </form>
                    <form
                        class="delete-form"
                        action="/centre/{{$centre->id}}"
                        method="POST"
                    >
                        @csrf @method('DELETE')
                        <div
                            onclick="document.querySelector('.delete-form').submit();"
                            class="delete"
                            style="
                                width: 1.2rem;
                                aspect-ratio: 1/1;
                                background-image: url('../storage/assets/svgs/trash.svg');
                                background-size: contain;
                                background-repeat: no-repeat;
                                background-position: center;
                                color: red;
                                cursor: pointer;
                            "
                            data-toggle="tooltip"
                            data-placement="left"
                            title="supprimer"
                        ></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endforeach @if (count($centres) == 0)
    <h4>Pas de centre pour le moment</h4>
    @endif
</div>
<div class="evenements-list-container">
    <table class="mb-0 table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Image</th>
                <th>Type</th>
                <th>Locale</th>
                <th>Actions</th>
            </tr>
        </thead>
        @if (count($centres) == 0)
        <tbody>
            <tr>
                <th scope="row">----</th>
                <td>----</td>
                <td>----</td>
                <td>----</td>
                <td>----</td>
                <td>----</td>
            </tr>
        </tbody>
        @endif @if (count($centres) != 0)
        <tbody>
            @foreach ($centres as $centre)
            <tr>
                <th scope="row">{{ $centre["id"] }}</th>
                <td>{{ $centre["nom"] }}</td>
                <td class="text-truncate" style="max-width: 150px">
                <img
            class="card-img-top"
            src="{{ 'storage/imgs/'.$centre['image'] }}"
            alt="evenement photo"
            style="max-height: 15rem; object-fit: cover
            width : 50px;
height : 50px;
            "
        />                </td>






     

            <td>
            @foreach ($less as $key => $value)

  @if($value->id==$centre["type_id"])


            {{ $value->type }}    
            
       
            
        
        @endif

@endforeach
               

                </td>
          



        
        
                













                <td>{{ $centre["locale"] }}</td>

                
                <td class="table-report__action w-56">

                            <!--    <div class="flex justify-center items-center">
                                    <form class="flex items-center mr-3" href="javascript:;"  >
                                    <i data-lucide="check-square" class="w-4 h-4 mr-1"></i> Edit
                                    

                                    </form>
                                    <form class="flex items-center text-danger" href="javascript:;" data-tw-toggle="modal" data-tw-target="#delete-confirmation-modal"  action="/deletecentre/{{$centre->id}}" method="POST">
                                    @csrf @method('DELETE')   
 
                                    <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i> Delete
                                    </form>


                                </div>
                          
-->

                     <!--
                                   <form
                        class="delete-form"
                        action="/deletecentre/{{$centre->id}}"
                        method="POST"
                    >
                        @csrf @method('DELETE')

                        <button
                            onclick="document.querySelector('.delete-form').submit()"
                            class="btn"
                            style="color: rgb(255, 35, 35); font-size: 1.2rem"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="supprimer"
                        >
                        <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>   
                                          </button>
                    </form>

-->

<form
                        class="edit-form"
                        action="/centre/{{ $centre['id'] }}/modifier"
                        method="GET"
                    >
                        <button
                            class="btn btn-success"
                            style="color: rgb(194, 194, 194); font-size: 1.2rem"
                            data-toggle="tooltip"
                            data-placement="top"
                            title="modifier"
                        >
                        <i data-lucide="check-square" class="w-4 h-4 mr-1"></i>                        </button>
                    </form>




                    <form class="delete-form" action="/deletecentre/{{$centre->id}}"method="POST">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger" data-toggle="tooltip" data-placement="left" title="supprimer" >                    
                         <i data-lucide="trash-2" class="w-4 h-4 mr-1"></i>   
                        </button>
                    </form>



                    <a href="{{ url('/centredetail/' . $centre->id) }}" title="View Student"><button class="btn btn-info btn-sm"><i class="fa fa-eye" aria-hidden="true"></i> View</button></a>







</td>






                
            </tr>
            @endforeach
        </tbody>
        @endif
    </table>
</div>

<script>
    document.querySelector("a#evenement-list").classList.add("mm-active");
    const toGrid = () => {
        document.querySelector(".evenements-list-container").style.display =
            "none";
        document.querySelector(".evenements-grid-container").style.display =
            "flex";
    };
    const toList = () => {
        document.querySelector(".evenements-grid-container").style.display =
            "none";
        document.querySelector(".evenements-list-container").style.display =
            "block";
    };
</script>
@endsection
