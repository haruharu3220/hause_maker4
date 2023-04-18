// function showSortOptions(event, n, tableId) {
//   // クリックした要素に対して選択肢を追加
//   const sortOptions = document.createElement("div");
//   sortOptions.innerHTML = `
//     <p onclick="sortTable(${n}, '${tableId}', 'asc')">昇順</p>
//     <p onclick="sortTable(${n}, '${tableId}', 'desc')">降順</p>
//   `;
//   sortOptions.style.position = "absolute";
//   sortOptions.style.backgroundColor = "#fff";
//   sortOptions.style.border = "1px solid #ccc";
//   sortOptions.style.padding = "5px";
//   sortOptions.style.zIndex = 1000;
//   event.target.appendChild(sortOptions);
// }

// function sortTable(n, tableId, direction) {
//   let table, rows, switching, i, x, y, shouldSwitch;
//   table = document.getElementById(tableId);
//   switching = true;

//   while (switching) {
//     switching = false;
//     rows = table.rows;
//     for (i = 1; i < rows.length - 1; i++) {
//       shouldSwitch = false;
//       x = rows[i].getElementsByTagName("TD")[n];
//       y = rows[i + 1].getElementsByTagName("TD")[n];
//       if (direction == "asc") {
//         if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
//           shouldSwitch = true;
//           break;
//         }
//       } else if (direction == "desc") {
//         if (x.innerHTML.toLowerCase() < y.innerHTML.toLowerCase()) {
//           shouldSwitch = true;
//           break;
//         }
//       }
//     }
//     if (shouldSwitch) {
//       rows[i].parentNode.insertBefore(rows[i + 1], rows[i]);
//       switching = true;
//     }
//   }
// }


function displayList(list) {
    const listElement = document.getElementById('sorted-list');
    listElement.innerHTML = '';

    list.forEach(tag => {
        // Build the list item HTML here
    });
}

function sortByImportance() {
    console.log(originalList);

    for (let i of originalList) {
        console.log(i.importance); // "0", "1", "2", "foo" が出力される
        if(i.importance==1){
              <li>                                       
                <section>
                    <div class="flex items-center mb-4 tag-area">
                        <h3 class="title w-1/3">{{$tag->name}}</h3>
                        @if($tag->status =="未決定")
                        <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-1/6 text-xs px-3 bg-red-200 text-red-800 rounded-full status">{{$tag->status}}</div>

                        @elseif($tag->status =="検討中")
                        <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-1/6 text-xs px-3 bg-blue-200 text-blue-800 rounded-full">{{$tag->status}}</div>
                        
                        @else($tag->status =="決定")
                        <div style="padding-top: 0.1em; padding-bottom: 0.1rem" class="w-1/6 text-xs px-3 bg-teal-200 text-teal-800 rounded-full">{{$tag->status}}</div>
                        @endif
                        
                        <!--★★★★★★★★★重要度★★★★★★★★★★★★-->
                        @if($tag->importance == NULL)
                        @elseif($tag->importance == 1)
                            <select name="名前" class="w-1/6 text-xs px-3 bg-red-200 text-gray-800 rounded-full">
                                <option selected>大</option>
                                <option>中</option>
                                <option>小</option>
                            </select>
                        @elseif($tag->importance == 2)
                            <select name="名前" class="w-1/6 text-xs px-3 bg-orange-200 text-gray-800 rounded-full">
                                <option>大</option>
                                <option selected>中</option>
                                <option>小</option>
                            </select>
                        @elseif($tag->importance == 3)
                            <select name="名前" class="w-1/6 text-xs px-3 bg-blue-200 text-gray-800 rounded-full">
                                <option>大</option>
                                <option>中</option>
                                <option selected>小</option>
                            </select>
                        @endif
                        <!--★★★★★★★★★重要度★★★★★★★★★★★★-->

                        <div class="datetime my-1 mr-4 flex items-center text-gray-600">{{ date('Y.m.d', strtotime($tag->deadline))  }}</div>
                        

                        <form action="{{ route('memoedit', $tag->id) }}" method="GET" class="text-left">
                        @csrf
                            <button>
                              <i class="fa-regular fa-pen-to-square"></i>
                            </button>
                        </form>
                    
                    </div>
                    <div class="box">
                        <h3 class="text-lg italic font-semibold mb-2">メモ</h3>
                        {{--<p>{{$tag->memo}}</p>--}}
                        <div>{!! nl2br(e($tag->memo)) !!}</div>
                    </div>
                </section>
            </li>
        }
        
    }
    const listElement = document.getElementById('sorted-list');
    
    
    
    
    listElement.innerHTML = '';
    const sortedList = originalList.slice().sort((a, b) => a.importance - b.importance);
    displayList(sortedList);
}

function sortByDeadline() {
     console.log("b");
    const sortedList = originalList.slice().sort((a, b) => new Date(a.deadline) - new Date(b.deadline));
    displayList(sortedList);
}

function filterByStatus() {
     console.log("c");
    const filteredList = originalList.filter(tag => tag.status === '検討中');
    displayList(filteredList);
}

document.getElementById('sort-importance').addEventListener('click', sortByImportance);
document.getElementById('sort-deadline').addEventListener('click', sortByDeadline);
document.getElementById('filter-status').addEventListener('click', filterByStatus);

// Display the original list on page load
// displayList(originalList);