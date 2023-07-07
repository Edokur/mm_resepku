<x-app-layout>
    <x-slot name="header">

        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container-fluid">
            <h3 class="text-info">Tulis Resepmu....</h3>
            <form action="{{ route('storeresep') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                  <label for="exampleInputEmail1">judul</label>
                  <input type="text" class="form-control" name="judul" id="exampleInputEmail1">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1" rows="3"></textarea>
                  </div>
                <label for="exampleFormControlTextarea1" class="text-info mt-2">Bahan - bahan</label>
                <div class="input-group control-group after-add-more">
                    <input type="text" name="bahan[]" class="form-control" placeholder="Bahan bahan">
                    <div class="input-group-btn"> 
                        <button class="btn btn-success add-more" type="button">Tambah</button>
                    </div>
                </div>
                <label for="exampleFormControlTextarea1" class="text-info mt-2">Langkah Pembuatan</label>
                <div class="input-group control-group after-add-more-langkah">
                    <input type="text" name="langkah_pembuatan[]" class="form-control" placeholder="Langkah Pembuatan">
                    <div class="input-group-btn"> 
                        <button class="btn btn-success add-more-langkah" type="button">Tambah</button>
                    </div>
                </div>
                <div class="custom-file mt-3">
                    <input type="file" class="custom-file-input" name="image" id="validatedCustomFile" required>
                    <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                  </div>
                <button type="submit" class="btn btn-primary btn-lg btn-block mt-4">Terbitkan Resep</button>
              </form>
        </div>

        <div class="copy d-none">
            <div class="control-group input-group" style="margin-top:10px">
              <input type="text" name="bahan[]" class="form-control" placeholder="Bahan bahan">
              <div class="input-group-btn"> 
                <button class="btn btn-danger remove" type="button">Hapus</button>
              </div>
            </div>
        </div>

        <div class="copy-langkah d-none">
            <div class="control-group-langkah input-group" style="margin-top:10px">
              <input type="text" name="langkah_pembuatan[]" class="form-control" placeholder="Langkah Pembuatan">
              <div class="input-group-btn"> 
                <button class="btn btn-danger remove-langkah" type="button">Hapus</button>
              </div>
            </div>
        </div>
    </x-slot>
    @push('script')
        <script>
        $(document).ready(function() {
            $(".add-more").click(function(){
                var html = $(".copy").html();
                $(".after-add-more").after(html);
            });
            $("body").on("click",".remove",function(){ 
                $(this).parents(".control-group").remove();
            });
        });
        
        $(document).ready(function() {
            $(".add-more-langkah").click(function(){
                var html = $(".copy-langkah").html();
                $(".after-add-more-langkah").after(html);
            });
            $("body").on("click",".remove-langkah",function(){ 
                $(this).parents(".control-group-langkah").remove();
            });
        });
        </script>
    @endpush
    
</x-app-layout>
