package com.khs.ch2;

import java.net.URLEncoder;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

@Controller // ctrl + shift + o 자동 임포트 
public class RegisterController {
	@RequestMapping(value="/register/add", method= {RequestMethod.POST, RequestMethod.GET})
	//@RequestMapping("/register/add")
//	servlet-context.xml에 view-controller 추가
//	@GetMapping("/register/add")
	public String register() {
		return "registerForm";
	}
	
	//@RequestMapping(value="/register/save", method=RequestMethod.POST)
	@PostMapping("/register/save")
	public String save(User user,Model m) throws Exception {
		// 1. 유효성 검사
		if(!isValid(user)) {
			String msg = URLEncoder.encode("id를 잘못입력하였습니다.","utf8");
			
			m.addAttribute("msg",msg);
			return "forward:/register/add";
//			return "redirect:/register/add?msg="+msg;
		}
		
		// 2. DB에 
		return "registerInfo";
	}

	private boolean isValid(User user) {
	
		return false;
	}
}
