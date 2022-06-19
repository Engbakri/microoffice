<form action="{{ route('tasks.destroy', $task->id) }}" method="post">
    <div class="modal-body">
        @csrf
        @method('DELETE')
        <h5 class="text-center"> هل تريد حذف {{ $task->task }} ? </h5>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
        <button type="submit" class="btn btn-danger">نعم, حذف</button>
    </div>
</form>