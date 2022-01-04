package com.khs.ch2;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

@Controller // ctrl + shift + o 자동 임포트 
public class RegisterController {
	//@RequestMapping(value="/register/save", method=RequestMethod.POST)
	//@RequestMapping("/register/add")
//	servlet-context.xml에 view-controller 추가
//	@GetMapping("/register/add")
//	public String register() {
//		return "registerForm";
//	}
	
	//@RequestMapping(value="/register/save", method=RequestMethod.POST)
	@PostMapping("/register/save")
	public String save() {
		return "registerInfo";
	}
}
