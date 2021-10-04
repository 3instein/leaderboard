<form action="{{ route('player.store') }}" method="post">
    @csrf
    <label for="nama" class="form-label">Nama</label>
    <input type="text" class="form-control" id="nama">
    <label for="poin" class="form-label">Poin</label>
    <input type="number" class="form-control" id="poin">
    <button type="submit">Add</button>
</form>
