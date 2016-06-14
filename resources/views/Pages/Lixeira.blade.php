@include('Components.Partials.FormLixo',
            [
                'Lixeiras'  => $Lixeiras,
                'SubCat'    => false ,
                'Action'    => 'itens/Reciclar',
                'UserID'    => $UserID,
            ])