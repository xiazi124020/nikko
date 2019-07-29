var NikkoDataTable =
(function () {
    'use strict';

    return {
        create_simple_paging_table : function(ref_id, options ) {
            options.paging = true;
            if ( options.pageLength === void 0 ) {
                options.pageLength = 10;
            }
            return this.create_simple_table(ref_id, options)
        },
        create_simple_table : function( ref_id, options ) {
            if ( options.paging === void 0 ) {
                options.paging = false
            }
            var dataTable= $(ref_id).DataTable(
                {
                    dom: 'Bfrtip',
                    data: options.data,
                    columns: options.columns,
                    columnDefs:options.columnDefs,
                    // fnDrawCallback: options.fnDrawCallback,
                    // language: {
                    //     emptyTable: "<li class='text-danger' align='center'>データなし</li>",
                    //     paginate: {
                    //         previous: "<",
                    //         next: ">",
                    //         first: "|<",
                    //         last: ">|"
                    //     }
                    // },
                    //aaSorting: [1, "desc" ],
                    ordering: false,
                    bInfo: false,
                    bLengthChange: false,
                    autoWidth:true,
                    paging: options.paging,
                    select: options.select,
                    pageLength:options.pageLength,
                    searching:false,
                    destory: options.destory,
                    processing:true,
                    orderClasses:false,
                    buttons:options.buttons,
                    processing: true,
                    searching: true,
                    serverSide: true,
                    // stripeClasses: ['stripe1','stripe2'],
                    info:false
                }
            );

            if (options.row_selected && typeof(options.row_selected) === 'function') {
                $('#' + ref_id +' tbody').on('click', 'tr', function() {
                    $('#ccypair tbody > tr').removeClass('selected');
                    $(this).addClass('selected');
                    options.row_selected()
                });
            }

            return dataTable;
        }
    };
})();
