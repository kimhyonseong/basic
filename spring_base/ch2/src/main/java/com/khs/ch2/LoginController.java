package com.khs.ch2;


import java.net.URLEncoder;

import javax.servlet.http.Cookie;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.CookieValue;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
@RequestMapping("/login")
public class LoginController {
	@GetMapping("/login")
	public String loginForm() {
		return "loginForm";
	}
	
	@GetMapping("/logout")
	public String logout(HttpSession session) {
		session.invalidate();
		return "redirect:/";
	}
	
	@PostMapping("/login")
	public String login(@CookieValue("id") String cookieId, String id, String pwd, boolean rememberId, 
			HttpServletRequest request,HttpServletResponse response,
			String toUrl) throws Exception {
		// 1. id와 pwd 확인
		if(!loginCheck(id,pwd)) {
			// 2-1. 일치하지 않으면 loginForm으로 이동
			String msg = URLEncoder.encode("id 또는 pwd가 일치하지 않습니다.","utf-8");
			
			return "redirect:/login/login?msg="+msg;
		}
		// 2-2. 일치 시, 
		// 세션 저장
		HttpSession session = request.getSession();
		session.setAttribute("id",id);
		
		
		if(rememberId) {
			Cookie cookie = new Cookie("id",id);
			response.addCookie(cookie);	
		} else {
			Cookie cookie = new Cookie("id",id);
			cookie.setMaxAge(0);
			response.addCookie(cookie);
		}
		
		// 2-2-1. 쿠키설정
		// 2-2-2. 응답에 저장
		// 2-2-3. 홈으로 이동
		toUrl = (toUrl == null || toUrl.equals("")) ? "/" : toUrl;
		return "redirect:"+toUrl;
	}

	private boolean loginCheck(String id, String pwd) {
		return "asdf".equals(id) && "1234".equals(pwd);
	}
}
