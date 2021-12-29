package com.khs.ch2;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller // ctrl + shift + o 자동 임포트 
public class RegisterController {
	@RequestMapping("/register/add")
	public String register() {
		return "registerForm";
	}
	
	@RequestMapping("/register/save")
	public String save() {
		return "registerInfo";
	}
}
