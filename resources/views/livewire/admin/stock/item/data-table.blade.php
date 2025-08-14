<div class="card">
    <div class="table-responsive">
        <table class="table table-vcenter">
            <thead>
                <tr>
                    <th>{{ __('Název') }}</th>
                    <th class="w-1"></th>
                </tr>
            </thead>
            <tbody>
                @forelse($items as $item)
                    <tr>
                        <td>{{ $item->name }}</td>
                        <td class="text-end">
                            <a href="{{ route('admin.stock.item.detail', $item) }}" class="btn btn-sm btn-outline-primary">{{ __('Detail') }}</a>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="2" class="text-muted">{{ __('Žádné položky') }}</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

