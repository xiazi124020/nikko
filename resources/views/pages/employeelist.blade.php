@extends('pages.common')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>社員管理</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/index">Home</a></li>
              <li class="breadcrumb-item active">社員管理</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <table id="employees"  style="width:100%">
        <!-- <thead>
          <tr>
            <th>内部名</th>
            <th>一般名</th>
            <th>表示名</th>
          </tr>
        </thead> -->
      </table>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection
  
@section('javascript')

<script type="text/javascript">
var editor;
var employeeTable;
$(window).on('load', function(){
  // editor = new $.fn.dataTable.Editor({
    // ajax: {
    //   create: {
    //     type: 'POST',
    //     url: '/employee/add',
    //     data:function(data){
    //       var result={};  
    //       for(var i in data.data){  
    //         var result=data.data[i];  
    //         result.DT_RowId=i; 
    //         result.action=data.action;
    //         var retjson = JSON.stringify( result );
    //         console.log(retjson);  
    //       }  
    //       return result;  
    //     },
    //     success: function (json) {
    //       createEmployeeTable();
    //     }
    //   },
    //   edit: {
    //     type: 'POST',
    //     url: '/employee/update',
    //     data:function(data){
    //       var result={};  
    //       for(var i in data.data){  
    //         var result=data.data[i];  
    //         result.DT_RowId=i; 
    //         result.action=data.action;
    //         var retjson = JSON.stringify( result );
    //         console.log(retjson);  
    //       }  
    //       return result;  
    //     },
    //     success: function (json) {
    //       createEmployeeTable();
    //     }
    //   },
    //   remove: {
    //     type: 'POST',
    //     url: '/employee/delete',
    //     data:function(data){
    //       var result={};  
    //       for(var i in data.data){  
    //         var result=data.data[i];  
    //         result.DT_RowId=i; 
    //         result.action=data.action;
    //         var retjson = JSON.stringify( result );
    //         console.log(retjson);  
    //       }  
    //       return result;  
    //     },
    //     success: function (json) {
    //       createEmployeeTable();
    //     },
    //     deleteBody: true
    //   }
    // },
  //   idSrc: "id",
  //   table: "#employees",
  //   fields: [{
  //       label: "社員番号:",
  //       name: "id"
  //     }, {
  //       label: "名前:",
  //       name: "name"
  //     }, {
  //       label: "カナ:",
  //       name: "kana"
  //     }
  //   ]
  // });
  employeeTable = createEmployeeTable();
} );

function createEmployeeTable() {
  var url="/employee/listdata";
  axios.post(url, {
    headers: {},
    data: {}
  }).then(response => {
    var datas = response.data;

    if(employeeTable) {
      employeeTable.destroy();
      employeeTable.clear();
    }

    $('#employees').DataTable( {
      dom: "Bfrtip",
      paging: true,
      data: datas,
      pageLength: 10,
      columns: [
        {
          "title":"社員番号",
          "data": "id"
        },
        {
          "title":"名前",
          "data": "name"
        },
        {
          "title":"カナ",
          "data": "kana"
        },
        {
          "title":"生年月日",
          "data": "birthday"
        },
        {
          "title":"性別",
          "data": "sex"
        },
        {
          "title":"携帯",
          "data": "mobile"
        },
        {
          "title":"職位",
          "data": "code_Name"
        },
        {
          "title":"email",
          "data": "email"
        },
        {
          "title":"プロジェクト",
          "data": "project_Id"
        }
      ],
      select: true,
      // columnDefs: [

      // ],
      buttons: [
        'copy', 'csv', 'excel', 'pdf', 'print'
      ]
      // buttons: [
      //   "print","csv"
      //   // { extend: "create", editor: editor },
      //   // { extend: "edit",   editor: editor },
      //   // { extend: "remove", editor: editor }
      // ]
    } );
  })
  .catch(err => {
    alert(err);
    return;
  });
}
 
</script>
@endsection