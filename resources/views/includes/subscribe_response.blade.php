@if(session()->get('subscribeResponse') !== null)

<!-- if need some styles add here -->





@endif


@isset(session()->get('subscribeResponse')['success'])
<div class="subs-response">
    <div class="alert alert-success alert-dismissible fade show" style="padding:0 1rem 0 2rem">
        <button type="button" class="close close-subs-note" data-dismiss="alert" style="position: relative;">&times;</button>
        {{ session()->get('subscribeResponse')['success'] }}
    </div>
</div>
@endisset
@isset(session()->get('subscribeResponse')['warning'])
<div class="subs-response">
    <div class="alert alert-warning alert-dismissible fade show" style="padding:0 1rem 0 2rem">
        <button type="button" class="close close-subs-note" data-dismiss="alert" style="position: relative;">&times;</button>
        {{ session()->get('subscribeResponse')['warning'] }}
    </div>
</div>
@endisset

@isset(session()->get('subscribeResponse')['error'])
<div class="subs-response">
    <div class="alert alert-danger alert-dismissible fade show" style="padding:0 1rem 0 2rem">
        <button type="button" class="close close-subs-note" data-dismiss="alert" style="position: relative;">&times;</button>
        {{ session()->get('subscribeResponse')['error'] }}
    </div>
</div>
@endisset
