<div class="card">
    <div class="table-responsive">
        <table class="table table-vcenter">
            <thead>
            <tr>
                <th>{{ __('Sklad') }}</th>
            </tr>
            </thead>
            <tbody>
            @forelse($inventories as $inventory)
                <tr>
                    <td>{{ $inventory->name }}</td>
                </tr>
            @empty
                <tr><td class="text-muted">{{ __('Žádné sklady') }}</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
</div>

