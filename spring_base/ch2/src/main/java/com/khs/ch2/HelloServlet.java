package com.khs.ch2;

import java.io.IOException;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

@WebServlet("/hello")
public class HelloServlet extends HttpServlet{

	@Override
	public void init() throws ServletException {
		// TODO Auto-generated method stub
		//super.init();
		// �������� �ʱ�ȭ �۾� ���
		System.out.println("[HelloServlet] init() is called.");
	}
	
	@Override
	protected void service(HttpServletRequest req, HttpServletResponse resp) throws ServletException, IOException {
		// TODO Auto-generated method stub
		//super.service(req, resp);
		// 1.�Է�
		// 2.ó��
		// 3.���
		System.out.println("[HelloServlet] service() is called.");
	}

	@Override
	public void destroy() {
		// TODO Auto-generated method stub
		//super.destroy();
		// ������ - �������� �޸𸮿��� ���ŵɶ� ������ �����̳ʿ� ���ؼ� �ڵ� ȣ��
		System.out.println("[HelloServlet] destroy() is called.");
	}
}