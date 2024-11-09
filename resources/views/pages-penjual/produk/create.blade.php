<div class="modal-header">
    <h4 class="modal-title">Tambah Barang</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">×</span>
    </button>
</div>
<div class="modal-body">
    <form method="POST" action="{{ route('produk-store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="exampleInputBarang">Nama Barang</label>
            <input type="text" class="form-control" id="exampleInputBarang" name="nama" placeholder="Input Barang" required>
        </div>

        @if(Auth::user()->role == 'Admin')
        <div class="form-group">
            <label for="exampleInputPenjual">Penjual</label>
            <select class="custom-select rounded-0" id="exampleInputPenjual" name="penjual_id" required>
                <option value="">--- Pilih Penjual---</option>
                @foreach($penjual as $penjual)
                <option value="{{$penjual->id}}">{{$penjual->nama_toko}}</option>
                @endforeach
            </select>
        </div>
        @endif

        <div class="form-group">
            <label for="exampleInputJenisMakanan">Jenis Kategori</label>
            <select class="custom-select rounded-0" id="exampleInputJenisMakanan" name="jenis" required>
                <option value="">--- Pilih Jenis Kategori ---</option>
                <option value="Mobile">Mobile Design</option>
                <option value="Logo">Logo Design</option>
                <option value="Website">Website Design</option>
            </select>
        </div>
        <div class="form-group">
            <label for="exampleInputStok">Stok</label>
            <input type="number" class="form-control" id="exampleInputStok" name="stok" placeholder="Input Stok" required>
        </div>
        <div class="form-group">
            <label for="exampleInputHarga">Harga/Pcs</label>
            <input type="number" class="form-control" id="exampleInputHarga" name="price" placeholder="Input Harga" required>
        </div>
        <div class="form-group">
            <label for="exampleInputDeskripsiBarang">Deskripsi Barang</label>
            <textarea class="form-control" id="exampleInputDeskripsiBarang" rows="4" placeholder="Deskripsi Barang" name="deskripsi_barang" required></textarea>
        </div>
        <div class="form-group">
            <label for="exampleInputFile">Input Gambar</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="form-control" required multiple name="foto[]" id="exampleInputFile">
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        </div>
    </form>
</div>