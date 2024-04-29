@extends('layout.admin')
@section('title', 'Вход')
@section('content')
<div class="container">
    <div class="admin-section">
        <table width="750" cellpadding="5" cellspacing="0">
            <thead>
                <th>Названия поста</th>
                <th >Решение</th>
              </tr>
            </thead>
            <tr>
             <td class="td1"><a href="" class="a">Пост 1</a></td>
             <td  class="td2" ><a  href="" class="a yes">Принять</a> <a   href="" class="a no">Отклонить</a></td>
            </tr>
        
           </table>
    </div>
</div>
@endsection
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">