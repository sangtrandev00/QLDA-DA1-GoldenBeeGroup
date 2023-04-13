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
          validatePassword: true
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

// Validate form at client

$("#setting-account-form").validate({
  rules: {
    ho_ten: {
      required: true,
    },
    sodienthoai: {
      required: true,
      // validatePhoneVN: true
      phone: true
    },
    companyname: {
      required: true,
    },
    diachi: {
      required: true
    }
  },
  messages: {
    ho_ten: {
      required: "Họ tên không được để trống",
    },
    sodienthoai: {
      required: "Số điện thoại không được để trống",
      phone: "Số điện thoại không đúng định dạng"
    },
    companyname: {
      required: "Công ty không được để trống",
    },
    diachi: {
      required: "Địa chỉ không được để trống"
    }
  }
})

("#shipping-address-form").validate({
  rules: {
    province_id: {
      required: true,
      min: 1
    },
    district_id: {
      required: true,
      min: 1
    },
    ward_id: {
      required: true,
      min: 1
      // validatePhoneVN: true
    },
    detail_address: {
      required: true,
    }
  },
  messages: {
    province_id: {
      required: "Tỉnh/Thành phố không được để trống",
    },
    district_id: {
      required: "Quận/Huyện không được để trống",
    },
    ward_id: {
      required: "Phường/Xã không được để trống",
    },
    detail_address: {
      required: "Địa chỉ chi tiết không được để trống"
    }
  }
})

$("#change-pass-form").validate({
  rules: {
    oldpass: {
      required: true,
    },
    newpass: {
      required: true,
      validatePassword: true
    },
    renewpass: {
      required: true,
      // validatePhoneVN: true
      equalTo: "#newpass"
    }
  },
  messages: {
    oldpass: {
      required: "Mật khẩu cũ không được để trống",
    },
    newpass: {
      required: "Mật khẩu mới không được để trống",
    },
    renewpass: {
      required: "Xác nhận mật khẩu không được để trống",
      equalTo: "Mật khẩu nhập lại không chính xác!"
    }
  }
})


 ("#shopping-cart-form").validate({
  rules: {
    qtybutton: {
      number: true,
      
    }
  },
  messages: {
    number: "Bắt buộc phải nhập số"
  }
 })

 $("#contact-form").validate({
  rules:{
    name: {
      required: true
    },
    email: {
      required: true,
      email: true
    },
    title: {
      required: true
    },
    phone: {
      required: true,
      number: true
    },
    content: {
      required: true
    }

  },
  messages: {
    name:{
      required: "Tên không được để trống!"
    },
    email: {
      required: "Email không được để trống!",
      email: "Email không đúng định dạng!"
    },
    title: {
      required: "Chủ đề không được để trống!"
    },
    phone: {
      required: "Số điện thoại không được để trống!",
      number:"Bạn hãy nhập bằng số!"
    },
    content: {
      required: "Nội dung không được để trống!"
    }
  }
})
  

$.validator.addMethod("validatePassword", function(value, element) {
  return this.optional(element) || /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,16}$/i.test(value);
  // "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ cái và ít nhất một chữ số");   
}, "Hãy nhập password từ 8 đến 16 ký tự bao gồm chữ cái và ít nhất một chữ số")

// $.validator.addMethod("validatePhoneVN", function(value, element)
// {
//     // if (preg_match('/^[0-9]{10}+$/', $phone)) {
//     //     return true;
//     // } else {
//     //     return false;
//     // }
//     return this.optional(element) || /^[0-9]{10}+$/i.test(value);
// }, "Hãy nhập đúng định dạng số điện thoại ở Việt Nam")
