@if($posts->hasPages())
<div class="mt-16 flex justify-center" id="pagination-container">
    {{ $posts->links() }}
</div>
@endif



