@extends('admin.layouts.app')

@section('content')

<h2 class="mb-4">
    Tambah Artikel AI
</h2>

<div class="card">

<div class="card-body">

    <form action="/admin/posts"
          method="POST"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">

            <label>Judul</label>

            <input type="text"
                   name="title"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Upload Gambar</label>

            <input type="file"
                   name="image"
                   class="form-control">

        </div>

        <div class="mb-3">

            <label>Deskripsi Singkat</label>

            <textarea id="description"
                      class="form-control"
                      rows="4"></textarea>

        </div>

        <button type="button"
                id="generateBtn"
                class="btn btn-success mb-3">

            Generate AI

        </button>

        <div class="mb-3">

            <label>Isi Artikel</label>

            <textarea name="content"
                      id="content"
                      class="form-control"
                      rows="12"></textarea>

        </div>

        <div class="mb-3">

            <label>Status</label>

            <select name="status"
                    class="form-control">

                <option value="draft">
                    Draft
                </option>

                <option value="publish">
                    Publish
                </option>

            </select>

        </div>

        <button class="btn btn-primary">

            Simpan Artikel

        </button>

    </form>

</div>

</div>

@endsection
<script src=
"https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js">
</script>

<script>

document
.getElementById('generateBtn')

.addEventListener('click', async function(){

    let description =
    document.getElementById('description').value;

    document.getElementById('content').value =
    'Sedang generate artikel...';

    try{

        let response = await axios.post(
        '/admin/generate-article',

        {
            description: description
        });

        document.getElementById('content').value =
        response.data.result;

    }catch(error){

        alert('Gagal generate artikel');

    }

});

</script>