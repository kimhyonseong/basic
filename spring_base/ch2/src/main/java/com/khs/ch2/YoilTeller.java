package com.khs.ch2;

import java.io.IOException;
import java.io.PrintWriter;
import java.util.Calendar;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.RequestMapping;

@Controller
// 년월일 입력시 요일 알려주는 프로그램
public class YoilTeller {
	//public static void main(String[] args) {
	@RequestMapping("/getYoil")
	public void main(HttpServletRequest request, HttpServletResponse response) throws IOException {
		String year = request.getParameter("year");
		String month = request.getParameter("month");
		String day = request.getParameter("day");
		
		int yyyy = Integer.parseInt(year);
		int mm = Integer.parseInt(month);
		int dd = Integer.parseInt(day);
		
		Calendar cal = Calendar.getInstance();
		cal.set(yyyy, mm - 1, dd);
		
		int dayOfWeek = cal.get(Calendar.DAY_OF_WEEK);
		char yoil = " 일월화수목금토".charAt(dayOfWeek);
		
		response.setContentType("text/html");
		response.setCharacterEncoding("utf8");
		PrintWriter out = response.getWriter();
		out.println("<html>");
		out.println("<head>");
		out.println("</head>");
		out.println("<body>");
		out.println(year + "년 "+month+"월 "+day+"일은 ");
		out.println(yoil+"요일입니다.");
		out.println("</body>");
		out.println("</html>");
	}

}
