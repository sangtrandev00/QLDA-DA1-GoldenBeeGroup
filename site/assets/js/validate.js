// // addproductForm form
// $( "#addproductForm" ).validate({
//     rules: {
//       tensp: {
//         required: true,
//       },
//       don_gia: {
//         required: true,
//         // equalTo: "#newpass"
//         number: true,
//         min: 0
//       },
//       giam_gia: {
//         required: true,
//         number: true,
//         min: 0,
//         max: 100
//         // equalTo: "#newpass"
//       },
//       ma_danhmuc: {
//         required: true,
//         // equalTo: "#newpass"
//         number: true
//       },
//       hinhanh1: {
//         required: true,
//         // equalTo: "#newpass"
//       }
     
//     },
//     messages: {
//         "tensp": {
//             required: "Bắt buộc nhập tên sản phẩm đầy đủ",
//         },
//         "don_gia": {
//             required: "Bắt buộc nhập số điện thoại",
//             number: "Giá trị nhập phải là số",
//             min: "Giá trị nhập phải lớn hơn 0"
//         },
//         "giam_gia": {
//             required: "Bắt buộc nhập giảm giá",
//             number: "Phải nhập số",
//             min: "Giá trị nhỏ nhất là 0",
//             max: "Giấ trị lớn nhất là 100"
//         },
//         "ma_danhmuc": {
//             required: "Bắt buộc nhập lại mã danh mục",
//             number: "Bắt buộc phải nhập mã danh mục"
//         },
//         "hinhanh1": {
//             required: "Bắt buộc nhập lại hình ảnh chính sản phẩm",
//             // equalTo: "Bắt buộc nhập giống mật khẩu"
//         }
//     }
//   });

//   // editproduct form
// $( "#editproductForm" ).validate({
//   rules: {
//     tensp: {
//       required: true,
//     },
//     don_gia: {
//       required: true,
//       // equalTo: "#newpass"
//       number: true,
//       min: 0
//     },
//     giam_gia: {
//       required: true,
//       number: true,
//       min: 0,
//       max: 100
//       // equalTo: "#newpass"
//     },
//     ma_danhmuc: {
//       required: true,
//       // equalTo: "#newpass"
//       number: true
//     },
//     hinhanh1: {
//       required: true,
//       // equalTo: "#newpass"
//     }
   
//   },
//   messages: {
//       "tensp": {
//           required: "Bắt buộc nhập tên sản phẩm đầy đủ",
//       },
//       "don_gia": {
//           required: "Bắt buộc nhập số điện thoại",
//           number: "Giá trị nhập phải là số",
//           min: "Giá trị nhập phải lớn hơn 0"
//       },
//       "giam_gia": {
//           required: "Bắt buộc nhập giảm giá",
//           number: "Phải nhập số",
//           min: "Giá trị nhỏ nhất là 0",
//           max: "Giấ trị lớn nhất là 100"
//       },
//       "ma_danhmuc": {
//           required: "Bắt buộc nhập lại mã danh mục",
//           number: "Bắt buộc phải nhập mã danh mục"
//       },
//       "hinhanh1": {
//           required: "Bắt buộc nhập lại hình ảnh chính sản phẩm",
//           // equalTo: "Bắt buộc nhập giống mật khẩu"
//       }
//   }
// });

//   // editcate form
//   $( "#addcateForm" ).validate({
//     rules: {
//       catename: {
//         required: true,
//       }
     
//     },
//     messages: {
//         "catename": {
//             required: "Bắt buộc nhập tên danh mục đầy đủ",
//         }
//     }
//   });
//   // editcate form
//   $( "#editcateForm" ).validate({
//     rules: {
//       catename: {
//         required: true,
//       }
     
//     },
//     messages: {
//         "catename": {
//             required: "Bắt buộc nhập tên danh mục đầy đủ",
//         }
//     }
//   });

//    // adduser form
//    $( "#adduserForm" ).validate({
//     rules: {
//       fullname: {
//         required: true,
//       },
//       address: {
//         required: true,
//       },
//       email: {
//         required: true,
//       },
//       phone: {
//         required: true,
//       },
//       username: {
//         required: true,
//       },
//       password: {
//         required: true,
//       },
//       imageurl: {
//         required: true,
//       },
//       role: {
//         required: true,
//         number: true
//       }
     
//     },
//     messages: {
//         "fullname": {
//             required: "Bắt buộc nhập tên sản phẩm đầy đủ",
//         },
//         "address": {
//             required: "Bắt buộc nhập địa chỉ đầy đủ",
//         },
//         "email": {
//             required: "Bắt buộc nhập địa chỉ email đầy đủ",
//         },
//         "phone": {
//             required: "Bắt buộc nhập số điện thoại",
//         },
//         "username": {
//             required: "Bắt buộc nhập username",
//         },
//         "password": {
//             required: "Bắt buộc nhập password",
//         },
//         "imageurl": {
//             required: "Bắt buộc nhập hình ảnh",
//         },
//         "role": {
//             required: "Bắt buộc nhập vai trò",
//             number: "Bắt buộc nhập vai trò"
//         }
//     }
//   });

//    // edituser form
//    $( "#edituserForm" ).validate({
//     rules: {
//       fullname: {
//         required: true,
//       },
//       address: {
//         required: true,
//       },
//       email: {
//         required: true,
//       },
//       phone: {
//         required: true,
//       },
//       username: {
//         required: true,
//       },
//       password: {
//         required: true,
//       },
//       imageurl: {
//         required: true,
//       },
//       role: {
//         required: true,
//         number: true
//       }
//     },
//     messages: {
//         "fullname": {
//             required: "Bắt buộc nhập tên sản phẩm đầy đủ",
//         },
//         "address": {
//             required: "Bắt buộc nhập địa chỉ đầy đủ",
//         },
//         "email": {
//             required: "Bắt buộc nhập địa chỉ email đầy đủ",
//         },
//         "phone": {
//             required: "Bắt buộc nhập số điện thoại",
//         },
//         "username": {
//             required: "Bắt buộc nhập username",
//         },
//         "password": {
//             required: "Bắt buộc nhập password",
//         },
//         "imageurl": {
//             required: "Bắt buộc nhập hình ảnh",
//         },
//         "role": {
//             required: "Bắt buộc nhập vai trò",
//             number: "Bắt buộc nhập vai trò"
//         }
//     }
//   });