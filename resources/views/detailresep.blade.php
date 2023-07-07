<x-app-layout>
    <x-slot name="header">
        <div class="container mb-5">
            <?php 
                $cbahan = count($bahan);
                $clangkah = count($langkah);
                // var_dump($cbahan);die;
            ?>
            <div class="mt-2">
                <img src="../image/{{ $resep->photo }}" class="card-img-top" width="100%" height="50%">
                <h3 class="mt-3">{{ $resep->judul }}</h3>
                <h6 class="mt-3">{{ $resep->deskripsi }}</h6>
                <h4 class="mt-1">Bahan - bahan</h4>
                @for ($i = 0; $i < $cbahan; $i++)
                    <p>{{ $bahan[$i] }}</p>
                @endfor

                <h4 class="mt-1">Langkah Pembuatan</h4>
                @for ($i = 0; $i < $clangkah; $i++)
                    <p>{{ $i + 1 .". ". $langkah[$i] }}</p>
                @endfor

            </div>
        </div>
    </x-slot>
</x-app-layout>