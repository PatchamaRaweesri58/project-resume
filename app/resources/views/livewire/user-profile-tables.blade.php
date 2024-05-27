{{-- <div class="table-responsive mt-4">
    <div>
        <table id="userTable" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Header</th>
                    <th>Contents</th>
                    <th>ว/ด/ป</th>
                    <th>ใช้งานล่าสุด</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($profile as $profiles)
                    <tr>
                        <td>{{ $profiles->id }}</td>
                        <td>{{ $profiles->header }}</td>
                        <td>{{ $profiles->contents }}</td>
                        <td>{{ $profiles->created_at }}</td>
                        <td>{{ $profiles->updated_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div> --}}

<div>
    <h2>User Profiles</h2>
    <ul>
        @foreach($userProfileTable as $userProfileTables)
            <li>{{ $userProfileTables->contents }}</li>
        @endforeach
    </ul>
</div>




{{-- <div>
    เรียกใช้คอมโพเนนต์ Livewire:
    @livewire('user-profile-table')
</div> --}}



{{-- ในสคริปต์ JavaScript, เรียกใช้ DataTables และ Livewire:
document.addEventListener('livewire:load', function () {
    $('#userTable').DataTable(); // เรียกใช้ DataTables ในตารางข้อมูล
}); --}}
