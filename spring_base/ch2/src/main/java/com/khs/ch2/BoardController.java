package com.khs.ch2;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpSession;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
@RequestMapping("/board")
public class BoardController {
	@GetMapping("/list")
	public String list(HttpServletRequest request) {
		if(!loginCheck(request)) {
			return "redirect:/login/login?toUrl="+request.getRequestURL();
		}
		
		return "boardList";
	}

	private boolean loginCheck(HttpServletRequest request) {
		// 1. 세션 얻기
		HttpSession session = request.getSession();
		// 2. 세션에 id가 있는지 확인
		return session.getAttribute("id") != null;
	}
}
