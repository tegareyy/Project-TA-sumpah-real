<!-- Modal -->
<div class="modal fade" id="formCreate" tabindex="-1" role="dialog" aria-labelledby="formCreateLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('user.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="formCreateLabel">
                        Create Petugas
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="name">Full Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Masukan Full Name"
                            name="name" required />
                    </div>

                    <div class="form-group">
                        <label for="gender">Gender</label>

                        <select name="gender" id="gender" class="form-control">
                            <option value="">-- Gender --</option>
                            @foreach ($list_gender as $gender)
                                <option value="{{ $gender }}">
                                    {{ $gender }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" class="form-control" id="email" placeholder="Masukan email address"
                            name="email" required />
                    </div>
                    <div class="form-group">
                        <label for="uid">Nomor Induk Pegawai</label>
                        <input type="text" class="form-control" id="uid"
                            placeholder="Masukan Nomor Induk Pegawai" name="uid" required />
                    </div>
                    <div class="form-group">
                        <label for="Password">Password</label>
                        <input type="password" class="form-control" id="Password" placeholder="Masukan Password"
                            name="password" required />
                    </div>
                    <div class="form-group">
                        <label for="role">Role</label>
                        <select name="role" id="role" class="form-control" required>
                            <option value="">-- Role Akses --</option>
                            @foreach ($list_level as $j)
                                <option value="{{ $j }}">
                                    {{ $j }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">
                        Simpan
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
