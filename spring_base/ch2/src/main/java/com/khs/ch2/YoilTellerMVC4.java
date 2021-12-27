package com.khs.ch2;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.Calendar;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.ExceptionHandler;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.servlet.ModelAndView;

@Controller
// ����� �Է½� ���� �˷��ִ� ���α׷�
public class YoilTellerMVC4 {
	@ExceptionHandler(Exception.class)
	public String catcher(Exception ex) {
		ex.printStackTrace();
		return "yoilError";
	}
	
	//http://localhost:9090/ch2/getYoilMVC?year=2021&month=10&day=1
	@RequestMapping("/getYoilMVC4")
	public String main(MyDate date, Model model) throws IOException {
		
		// 1. ��ȿ�� �˻�
		if(!isVaild(date)) {
			return "yoilError";
		}
		
		
		// 2. ���� ���
		char yoil = getYoil(date);
		
		// 3. ����� ����� model�� ����
		model.addAttribute("myDate", date);
		model.addAttribute("yoil", yoil);
		
		return "yoil";  //  /WEB-INF/view/yoil.jsp
	}

	private char getYoil(MyDate date) {
		return getYoil(date.getYear(), date.getMonth(), date.getDay());
	}

	private boolean isVaild(MyDate date) {
		return isVaild(date.getYear(), date.getMonth(), date.getDay());
	}

	private boolean isVaild(int year, int month, int day) {
		return true;
	}

	private char getYoil(int year, int month, int day) {
		Calendar cal = Calendar.getInstance();
		cal.set(year, month - 1, day);
		
		int dayOfWeek = cal.get(Calendar.DAY_OF_WEEK);
		return " �Ͽ�ȭ�������".charAt(dayOfWeek);
	}

}
