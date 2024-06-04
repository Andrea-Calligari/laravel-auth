@extends('layouts.app')
@section('content')

<div class="container p-5">
    <div class="card ">
        <div class="card-header">
            <div class="card-title">
                <div>Name: {{$portfolio->project_name}}</div>
            </div>
            <div>Description {{$portfolio->description}}</div>
        </div>
        <div class="card-body">
            <div>Working Hours: {{$portfolio->working_hours}}</div>
            <div>Co-Workers {{$portfolio->co_workers}}</div>
            <a class="btn btn-outline-warning" href="{{ route('admin.portfolios.edit', $portfolio)}}">Edit</a>
            <button class="btn btn-outline-danger" id="trash">Trash</button>
            <script>
                let trash = document.getElementById('trash')

                trash.addEventListener('click', function () {

                    let form = document.getElementById('form')

                    let trashConf = confirm('Sei sicuro di volere eliminare?')
                    if (trashConf === true) {

                        form.innerHTML +=
                            `
                          <form action="{{ route('admin.portfolios.destroy', $portfolio) }}" method="POST">
                          @method('DELETE')
                          @csrf

                          
     
                          <button type="submit" style="display:none;" id='confirm'>trash</button>

                          </form>
                        `
                        let confirm = document.getElementById('confirm').click()

                    }


                })
            </script>

        </div>
    </div>
</div>





@endsection