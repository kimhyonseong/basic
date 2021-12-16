package com.khs.ch2;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.Calendar;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.servlet.ModelAndView;

@Controller
// ����� �Է½� ���� �˷��ִ� ���α׷�
public class YoilTellerMVC {
	//http://localhost:9090/ch2/getYoilMVC?year=2021&month=10&day=1
	@RequestMapping("/getYoilMVC")
	//public void main(HttpServletRequest request, HttpServletResponse response) throws IOException {
	//public String main(int year, int month, int day, Model model) throws IOException {
	//public void main(int year, int month, int day, Model model) throws IOException {
	public ModelAndView main(int year, int month, int day) throws IOException {
		
		ModelAndView mv = new ModelAndView();
		
		// 1. ��ȿ�� �˻�
//		if(!isVaild(year, month, day)) {
//			return "yoilError";
//		}
		
		
		// 2. ���� ���
		char yoil = getYoil(year, month, day);
		
		// 3. ����� ����� model�� ����
//		model.addAttribute("year", year);
//		model.addAttribute("month", month);
//		model.addAttribute("day", day);
//		model.addAttribute("yoil", yoil);
		
		mv.addObject("year", year);
		mv.addObject("month", month);
		mv.addObject("day", day);
		mv.addObject("yoil", yoil);
		
		mv.setViewName("yoil");
		
		return mv;
		//return "yoil";  //  /WEB-INF/view/yoil.jsp
	}

	private boolean isVaild(int year, int month, int day) {
		// TODO Auto-generated method stub
		return true;
	}

	private char getYoil(int year, int month, int day) {
		Calendar cal = Calendar.getInstance();
		cal.set(year, month - 1, day);
		
		int dayOfWeek = cal.get(Calendar.DAY_OF_WEEK);
		return " �Ͽ�ȭ�������".charAt(dayOfWeek);
	}

}
