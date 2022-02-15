package com.khs.ch2;

import java.util.List;

import javax.validation.Valid;

import org.springframework.beans.propertyeditors.StringArrayPropertyEditor;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.validation.Validator;
import org.springframework.web.bind.WebDataBinder;
import org.springframework.web.bind.annotation.InitBinder;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;

@Controller // ctrl + shift + o 자동 임포트 
public class RegisterController {
	@InitBinder
	public void toDate(WebDataBinder binder) {
//		SimpleDateFormat df = new SimpleDateFormat("yyy-MM-dd");
//		binder.registerCustomEditor(Date.class, new CustomDateEditor(df,false));
		binder.registerCustomEditor(String[].class, new StringArrayPropertyEditor("#"));
		//binder.setValidator(new UserValidator());
		binder.addValidators(new UserValidator());
		List<Validator> validatorList = binder.getValidators();
		System.out.println("validators = "+validatorList);
	}
	
	@RequestMapping(value="/register/add", method= {RequestMethod.POST, RequestMethod.GET})
	//@RequestMapping("/register/add")
//	servlet-context.xml에 view-controller 추가
//	@GetMapping("/register/add")
	public String register() {
		return "registerForm";
	}
	
	//@RequestMapping(value="/register/save", method=RequestMethod.POST)
	@PostMapping("/register/save")
	public String save(@Valid User user,BindingResult result,Model m) throws Exception {
		// BindingResult가 있으면 에러 페이지로 가는게 아니라 컨트롤러한테 처리 맡김
		//System.out.println("result="+result);
		//System.out.println("user="+user);
		
		// 수동검증
//		UserValidator userValidator = new UserValidator();
//		userValidator.validate(user,result);
		
		if(result.hasErrors()) {
			return "registerForm";
		}
		// 1. 유효성 검사
//		if(!isValid(user)) {
//			String msg = URLEncoder.encode("id를 잘못입력하였습니다.","utf8");
//			
//			m.addAttribute("msg",msg);
//			return "forward:/register/add";
////			return "redirect:/register/add?msg="+msg;
//		}
		
		// 2. DB에 
		return "registerInfo";
	}

	private boolean isValid(User user) {
	
		return true;
	}
}
