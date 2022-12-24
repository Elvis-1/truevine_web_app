@php
    use App\Models\Users;

    // retrieve a model by its primary key
    $user = User::find(1);

    // retrieve the first model that matches a query constraints
    $user = User::where('subscription', 1)->first();

    // you can also retrieve a the first model that matches a contraint with firstWhere
    $user = User::firstWhere('subsription',1);
@endphp
zzz
