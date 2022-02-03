package com.khs.ch2;

import java.net.URLEncoder;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

@Controller // ctrl + shift + o �ڵ� ����Ʈ 
public class RegisterController {
	@RequestMapping(value="/register/add", method= {RequestMethod.POST, RequestMethod.GET})
	//@RequestMapping("/register/add")
//	servlet-context.xml�� view-controller �߰�
//	@GetMapping("/register/add")
	public String register() {
		return "registerForm";
	}
	
	//@RequestMapping(value="/register/save", method=RequestMethod.POST)
	@PostMapping("/register/save")
	public String save(User user,Model m) throws Exception {
		// 1. ��ȿ�� �˻�
		if(!isValid(user)) {
			String msg = URLEncoder.encode("id�� �߸��Է��Ͽ����ϴ�.","utf8");
			
			m.addAttribute("msg",msg);
			return "forward:/register/add";
//			return "redirect:/register/add?msg="+msg;
		}
		
		// 2. DB�� 
		return "registerInfo";
	}

	private boolean isValid(User user) {
	
		return false;
	}
}