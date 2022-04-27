package com.fastcampus.ch4.controller;

import com.fastcampus.ch4.domain.BoardDto;
import com.fastcampus.ch4.domain.PageHandler;
import com.fastcampus.ch4.domain.SearchCondition;
import com.fastcampus.ch4.service.BoardService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.servlet.mvc.support.RedirectAttributes;

import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpSession;
import java.time.Instant;
import java.time.LocalDate;
import java.time.ZoneId;
import java.util.HashMap;
import java.util.List;
import java.util.Map;

@Controller
@RequestMapping("/board")
public class BoardController {
    @Autowired
    BoardService boardService;

    @GetMapping("/write")
    public String write(Model m){
        m.addAttribute("mode","new");
        return "board";
    }

    @PostMapping("/write")
    public String write(BoardDto boardDto,Model m,HttpSession session,RedirectAttributes ratt){
        String writer = (String)session.getAttribute("id");
        boardDto.setWriter(writer);

        try {
            int rowCnt = boardService.write(boardDto);

            if (rowCnt != 1) {
                throw new Exception("write fail");
            }

            // 세션을 이용한 일회성 저장
            ratt.addFlashAttribute("msg","WRT_OK");
            return "redirect:/board/list";
        } catch (Exception exception) {
            exception.printStackTrace();
            m.addAttribute(boardDto);
            ratt.addFlashAttribute("msg","WRT_ERR");
            return "board";
        }
    }

    @PostMapping("/modify")
    public String modify(BoardDto boardDto,Model m,HttpSession session,RedirectAttributes ratt){
        String writer = (String)session.getAttribute("id");
        boardDto.setWriter(writer);

        try {
            int rowCnt = boardService.modify(boardDto);

            if (rowCnt != 1) {
                throw new Exception("modify fail");
            }

            // 세션을 이용한 일회성 저장
            ratt.addFlashAttribute("msg","MOD_OK");
            return "redirect:/board/list";
        } catch (Exception exception) {
            exception.printStackTrace();
            m.addAttribute(boardDto);
            ratt.addFlashAttribute("msg","MOD_ERR");
            return "board";
        }
    }

    @PostMapping("/remove")
    public String remove(Integer bno, Integer page, Integer pageSize, Model m, HttpSession session, RedirectAttributes rattr) {
        //RedirectAttributes에 저장하면 메시지 한번만 나오게 됨
        String writer = (String) session.getAttribute("id");
        try {
            int rowCnt = boardService.remove(bno,writer);

            // redirect 할때 자동으로 파라미터로 붙음
            m.addAttribute("page",page);
            m.addAttribute("pageSize",pageSize);

            if (rowCnt != 1)
                throw new Exception("board remove error");

            //addFlashAttribute 한번 사용후 없어짐
            rattr.addFlashAttribute("msg","DEL_OK");
        } catch (Exception exception) {
            exception.printStackTrace();
            rattr.addFlashAttribute("msg","DEL_ERROR");
        }

        return "redirect:/board/list";
    }

    @GetMapping("/read")
    public String read(Integer bno, Integer page, Integer pageSize,Model m) {
        try {
            BoardDto boardDto = boardService.read(bno);
//            m.addAttribute("boardDto",boardDto);
            m.addAttribute(boardDto);
            m.addAttribute("page",page);
            m.addAttribute("pageSize",pageSize);
        } catch (Exception exception) {
            exception.printStackTrace();
        }

        return "/board";
    }

    @GetMapping("/list")
    public String list(SearchCondition sc, Model m, HttpServletRequest request) {
        if(!loginCheck(request))
            return "redirect:/login/login?toURL="+request.getRequestURL();  // 로그인을 안했으면 로그인 화면으로 이동

        try {
            int totalCnt = boardService.getSearchResultCnt(sc);
            m.addAttribute("totalCnt",totalCnt);

            PageHandler pageHandler = new PageHandler(totalCnt,sc);

            List<BoardDto> list = boardService.getSearchResultPage(sc);
            m.addAttribute("list",list);
            m.addAttribute("ph",pageHandler);

            Instant startOfToday = LocalDate.now().atStartOfDay(ZoneId.systemDefault()).toInstant();
            m.addAttribute("startOfToday",startOfToday);
        } catch (Exception exception) {
            exception.printStackTrace();
        }

        return "boardList"; // 로그인을 한 상태이면, 게시판 화면으로 이동
    }

    private boolean loginCheck(HttpServletRequest request) {
        // 1. 세션을 얻어서
        HttpSession session = request.getSession();
        // 2. 세션에 id가 있는지 확인, 있으면 true를 반환
        return session.getAttribute("id")!=null;
    }
}