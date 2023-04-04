// Authentication at client 
// Login Client Form
$("#login-client-form").validate({
  rules: {
      email: {
          required: true,
          email: true,
      },
      password: {
          required: true,
          // minlength: 8,
          // validatePassword: true
      }
  },
  messages: {
      "email": {
          required: "Email không được để trống!",
          email: "Định dạng email không chính xác!"
      },
      "password": {
          required: "Password không được để trống!",
          minlength: "Tối thiểu 8 ký tự"
      }
      
  }
})


$("#signup-client-form").validate({
  rules: {
      fullname: {
          required: true,
      },
      email: {
          required: true,
          email: true
      },
      password: {
          required: true,
          minlength: 8,
          validatePassword: true
      },
      reenterpass: {
          required: true,
          equalTo: "#password"
      }
  },
  messages: {
      "fullname": {
          required: "Họ tên không được để trống!"
      },
      "email": {
          required: "Emai không được để trống!",
          email: "Nhập đúng định dạng email"
      },
      "password": {
          required: "Password không được để trống!"
      },
      "reenterpass": {
          required: "Nhập lại mật khẩu, không được để trống!",
          equalTo: "Nhập lại mật khẩu không chính xác!"
      }
  }
})

// Forgot pass section

$("#forgot-pass-client-form").validate({
  rules: {
    email: {
      required: true,
      email: true
    }
  },
  messages: {
    email: {
      required: "Email Không được để trống",
      email: "Đúng định dạng email"
    }
  }
})

// Reset pass client validation

$("#reset-pass-client-form").validate({
  rules: {
    newpass: {
      required: true,
      validatePassword: true
    },
    renewpass: {
      required: true,
      equalTo: "#newpass"
    }
  },
  messages: {
    newpass: {
      required: "Không để trống mật khẩu mới!"
    },
    renewpass: {
      required: "Không để trống nhập lại mật khẩu!",
      equalTo: "Nhập lại mật khẩu không chính xác!"
    }
  }
})
$.validator.addMethod("validatePassword", function(value, element) {
  return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
  // "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ cái và ít nhất một chữ số");   
}, "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ cái và ít nhất một chữ số")



// addproductForm form
$( "#addproductForm" ).validate({
    rules: {
      tensp: {
        required: true,
      },
      don_gia: {
        required: true,
        // equalTo: "#newpass"
        number: true,
        min: 0
      },
      giam_gia: {
        required: true,
        number: true,
        min: 0,
        max: 100
        // equalTo: "#newpass"
      },
      ma_danhmuc: {
        required: true,
        // equalTo: "#newpass"
        number: true
      },
      hinhanh1: {
        required: true,
        // equalTo: "#newpass"
      }
     
    },
    messages: {
        "tensp": {
            required: "Bắt buộc nhập tên sản phẩm đầy đủ",
        },
        "don_gia": {
            required: "Bắt buộc nhập số điện thoại",
            number: "Giá trị nhập phải là số",
            min: "Giá trị nhập phải lớn hơn 0"
        },
        "giam_gia": {
            required: "Bắt buộc nhập giảm giá",
            number: "Phải nhập số",
            min: "Giá trị nhỏ nhất là 0",
            max: "Giấ trị lớn nhất là 100"
        },
        "ma_danhmuc": {
            required: "Bắt buộc nhập lại mã danh mục",
            number: "Bắt buộc phải nhập mã danh mục"
        },
        "hinhanh1": {
            required: "Bắt buộc nhập lại hình ảnh chính sản phẩm",
            // equalTo: "Bắt buộc nhập giống mật khẩu"
        }
    }
  });

  // editproduct form
$( "#editproductForm" ).validate({
  rules: {
    tensp: {
      required: true,
    },
    don_gia: {
      required: true,
      // equalTo: "#newpass"
      number: true,
      min: 0
    },
    giam_gia: {
      required: true,
      number: true,
      min: 0,
      max: 100
      // equalTo: "#newpass"
    },
    ma_danhmuc: {
      required: true,
      // equalTo: "#newpass"
      number: true
    },
    hinhanh1: {
      required: true,
      // equalTo: "#newpass"
    }
   
  },
  messages: {
      "tensp": {
          required: "Bắt buộc nhập tên sản phẩm đầy đủ",
      },
      "don_gia": {
          required: "Bắt buộc nhập số điện thoại",
          number: "Giá trị nhập phải là số",
          min: "Giá trị nhập phải lớn hơn 0"
      },
      "giam_gia": {
          required: "Bắt buộc nhập giảm giá",
          number: "Phải nhập số",
          min: "Giá trị nhỏ nhất là 0",
          max: "Giấ trị lớn nhất là 100"
      },
      "ma_danhmuc": {
          required: "Bắt buộc nhập lại mã danh mục",
          number: "Bắt buộc phải nhập mã danh mục"
      },
      "hinhanh1": {
          required: "Bắt buộc nhập lại hình ảnh chính sản phẩm",
          // equalTo: "Bắt buộc nhập giống mật khẩu"
      }
  }
});

  // editcate form
  $( "#addcateForm" ).validate({
    rules: {
      catename: {
        required: true,
      }
     
    },
    messages: {
        "catename": {
            required: "Bắt buộc nhập tên danh mục đầy đủ",
        }
    }
  });
  // editcate form
  $( "#editcateForm" ).validate({
    rules: {
      catename: {
        required: true,
      }
     
    },
    messages: {
        "catename": {
            required: "Bắt buộc nhập tên danh mục đầy đủ",
        }
    }
  });

   // adduser form
   $( "#adduserForm" ).validate({
    rules: {
      fullname: {
        required: true,
      },
      address: {
        required: true,
      },
      email: {
        required: true,
      },
      phone: {
        required: true,
      },
      username: {
        required: true,
      },
      password: {
        required: true,
      },
      imageurl: {
        required: true,
      },
      role: {
        required: true,
        number: true
      }
     
    },
    messages: {
        "fullname": {
            required: "Bắt buộc nhập tên sản phẩm đầy đủ",
        },
        "address": {
            required: "Bắt buộc nhập địa chỉ đầy đủ",
        },
        "email": {
            required: "Bắt buộc nhập địa chỉ email đầy đủ",
        },
        "phone": {
            required: "Bắt buộc nhập số điện thoại",
        },
        "username": {
            required: "Bắt buộc nhập username",
        },
        "password": {
            required: "Bắt buộc nhập password",
        },
        "imageurl": {
            required: "Bắt buộc nhập hình ảnh",
        },
        "role": {
            required: "Bắt buộc nhập vai trò",
            number: "Bắt buộc nhập vai trò"
        }
    }
  });

   // edituser form
   $( "#edituserForm" ).validate({
    rules: {
      fullname: {
        required: true,
      },
      address: {
        required: true,
      },
      email: {
        required: true,
      },
      phone: {
        required: true,
      },
      username: {
        required: true,
      },
      password: {
        required: true,
      },
      imageurl: {
        required: true,
      },
      role: {
        required: true,
        number: true
      }
    },
    messages: {
        "fullname": {
            required: "Bắt buộc nhập tên sản phẩm đầy đủ",
        },
        "address": {
            required: "Bắt buộc nhập địa chỉ đầy đủ",
        },
        "email": {
            required: "Bắt buộc nhập địa chỉ email đầy đủ",
        },
        "phone": {
            required: "Bắt buộc nhập số điện thoại",
        },
        "username": {
            required: "Bắt buộc nhập username",
        },
        "password": {
            required: "Bắt buộc nhập password",
        },
        "imageurl": {
            required: "Bắt buộc nhập hình ảnh",
        },
        "role": {
            required: "Bắt buộc nhập vai trò",
            number: "Bắt buộc nhập vai trò"
        }
    }
  });